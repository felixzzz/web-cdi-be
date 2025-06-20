<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class WebApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(!$request->header('x-xsrf-token')){
        //     abort(404);
        // }

        $locale = session('locale', config('app.locale'));

        if ($request->header('lang')) {
            $locale = $request->header('lang');
            session(['locale' => $locale]);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
