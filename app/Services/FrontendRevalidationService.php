<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FrontendRevalidationService
{
    /**
     * Trigger revalidation on Next.js frontend and clear backend caches.
     *
     * @param string|null $path Specific path to revalidate, e.g. '/', or null for all
     * @param string|null $tag Specific Next.js cache tag, e.g. 'cms-data', 'seo-metadata'
     * @param string $type 'layout' or 'page'
     * @param bool $async Whether to run after the HTTP response has been sent
     */
    public static function trigger(?string $path = '/', ?string $tag = null, string $type = 'layout', bool $async = true): void
    {
        // 1. Clear backend cache
        self::clearBackendCache();

        $action = function () use ($path, $tag, $type) {
            self::sendWebhook($path, $tag, $type);
        };

        // If running in HTTP context with afterResponse support
        if ($async && function_exists('dispatch')) {
            try {
                dispatch($action)->afterResponse();
                return;
            } catch (\Throwable $e) {
                // Fallback to synchronous execution
            }
        }

        $action();
    }

    /**
     * Clear all Laravel application/repository caches.
     */
    public static function clearBackendCache(): void
    {
        try {
            Cache::flush();
        } catch (\Throwable $e) {
            Log::warning('[FrontendRevalidation] Failed to flush backend cache: ' . $e->getMessage());
        }
    }

    /**
     * Send HTTP webhook request to Next.js /api/revalidate.
     */
    public static function sendWebhook(?string $path = '/', ?string $tag = null, string $type = 'layout'): bool
    {
        $frontendUrl = config('services.frontend.url', env('FRONTEND_URL', 'http://localhost:3000'));
        $secretToken = config('services.frontend.revalidate_secret', env('REVALIDATION_SECRET_TOKEN', 'cdi-revalidate-secret-token-2026'));

        if (empty($frontendUrl)) {
            Log::info('[FrontendRevalidation] FRONTEND_URL is not configured. Skipping webhook.');
            return false;
        }

        $endpoint = rtrim($frontendUrl, '/') . '/api/revalidate';

        try {
            $payload = [
                'path' => $path ?: '/',
                'type' => $type,
            ];

            if ($tag) {
                $payload['tag'] = $tag;
            }

            $response = Http::timeout(4)
                ->withHeaders([
                    'x-revalidate-secret' => $secretToken,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])
                ->post($endpoint, $payload);

            if ($response->successful()) {
                Log::info('[FrontendRevalidation] Successfully revalidated Next.js cache', [
                    'endpoint' => $endpoint,
                    'response' => $response->json(),
                ]);
                return true;
            } else {
                Log::warning('[FrontendRevalidation] Next.js returned non-200 status', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return false;
            }
        } catch (\Throwable $e) {
            Log::warning('[FrontendRevalidation] Unable to contact Next.js frontend: ' . $e->getMessage());
            return false;
        }
    }
}
