<?php

use App\Http\Controllers\Api\ApiUtilityController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\WebApiMiddleware;

Route::middleware(WebApiMiddleware::class)
    ->as('api.')
    ->group(function () {
        Route::controller(ApiUtilityController::class)
            ->as('utility.')
            ->prefix('utility')
            ->group(function () {
                Route::get('/home', 'home')->name('home');
                Route::get('/governance', 'governance')->name('governance');
                Route::get('/investor', 'investor')->name('investor');
                Route::get('/our-business', 'ourBusiness')->name('our-business');
                Route::get('/about-us/{type}', 'aboutUs')->name('about-us.index')->whereIn("type", ["award", "management", "who-we-are"]);
                Route::get('/sustainability/{type}', 'sustainability')->name('sustainability.index')->whereIn("type", ["overview", "environment", "social", "governance", "report", "action"]);
                Route::get('/quick-link/{type}', 'quickLink')->name('quick-link')->whereIn("type", ["home", "governance", "about-us"]);
            });
    });
