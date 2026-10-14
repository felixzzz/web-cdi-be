<?php

namespace App\Console\Commands;

use App\Services\FrontendRevalidationService;
use Illuminate\Console\Command;

class FrontendRevalidateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'frontend:revalidate 
                            {--path= : Path to revalidate, defaults to /} 
                            {--tag= : Tag to revalidate, e.g. cms-data, seo-metadata} 
                            {--type=layout : Revalidation mode: layout or page}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge Laravel backend cache and trigger Next.js on-demand frontend revalidation';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $path = $this->option('path') ?: '/';
        $tag = $this->option('tag');
        $type = $this->option('type') ?: 'layout';

        $this->info("Flushing backend cache...");
        FrontendRevalidationService::clearBackendCache();
        $this->line("<info>✓</info> Backend cache cleared.");

        $frontendUrl = config('services.frontend.url', env('FRONTEND_URL', 'http://localhost:3000'));
        $this->info("Triggering frontend revalidation at {$frontendUrl} (path: {$path}, type: {$type}" . ($tag ? ", tag: {$tag}" : "") . ")...");

        $success = FrontendRevalidationService::sendWebhook($path, $tag, $type);

        if ($success) {
            $this->info("✓ Successfully revalidated frontend cache!");
            return Command::SUCCESS;
        } else {
            $this->warn("⚠ Revalidation request completed with warnings or frontend was unreachable. Check storage/logs/laravel.log for details.");
            return Command::FAILURE;
        }
    }
}
