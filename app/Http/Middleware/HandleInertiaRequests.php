<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $flashProperties = [];

        if ($errorFlash = $request->session()->get('error'))
            $flashProperties['error'] = $errorFlash;
        if ($successFlash = $request->session()->get('success'))
            $flashProperties['success'] = $successFlash;

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'career_url' => config("services.career_url"),
            'flash' => [
                ...$flashProperties
            ],
            'auth' => [
                'user' => $request->user(),
            ],
            'locale' => fn () => App::currentLocale(),
            'translations' => function () {
                $locale = App::currentLocale();
                $path = lang_path("{$locale}.json");
                return File::exists($path) ? json_decode(File::get($path), true) : [];
            },
        ];
    }
}
