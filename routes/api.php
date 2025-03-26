<?php

use App\Http\Controllers\Api\ApiArticleController;
use App\Http\Controllers\Api\ApiPressReleaseController;
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

                Route::get('/our-histories', 'ourHistories')->name('our-histories');
                Route::get('/milestones', 'milestones')->name('milestones');
                Route::get('/latest-reports', 'latestReports')->name('latest-reports');
                Route::get('/main-office', 'mainOffice')->name('main-office');
                Route::get('/other-offices', 'otherOffices')->name('other-offices');
                Route::get('/categories', 'categories')->name('categories');


                Route::get('/additional-page/{type}', 'additionalPage')->name('additional-page');
                Route::get('/additional-file/{type}', 'additionalFile')->name('additional-file');
                Route::get('/teams/{type}', 'teams')->name('teams');
            });

        Route::controller(ApiArticleController::class)
            ->as('article.')
            ->prefix('article')
            ->group(function () {
                Route::get("list/{type}", "list")->name("list");
                Route::get("latest", "latest")->name("latest");
                Route::get("latest-media", "latestMedia")->name("latest-media");
                Route::get("relates/{ulid}", "relates")->name("relates");
            });

        Route::controller(ApiPressReleaseController::class)
            ->as('press-releases.')
            ->prefix('press-releases')
            ->group(function () {
                Route::get("list", "list")->name("list");
            });
    });
