<?php

use App\Http\Controllers\Admin\Article\AdminArticleCategoryController;
use App\Http\Controllers\Admin\Article\AdminBlogController;
use App\Http\Controllers\Admin\Article\AdminNewsController;
use App\Http\Controllers\Admin\Article\AdminPressReleaseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Investor\AdminInvestorReportController;
use App\Http\Controllers\Admin\Role\AdminRoleController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Utility\AdminEditorController;
use App\Http\Controllers\Admin\Utility\AdminQuickLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\AuthSession;
use App\Http\Middleware\GuestSession;
use App\Http\Middleware\OnlySuperadminMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
->as("admin.")
->group(function () {
    Route::middleware(GuestSession::class)->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware(AuthSession::class)->group(function () {
        Route::get("/dashboard", [HomeController::class, 'index'])->name("dashboard");

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        Route::resource('roles', AdminRoleController::class)->middleware([OnlySuperadminMiddleware::class]);
        Route::resource('users', AdminUserController::class)->middleware([OnlySuperadminMiddleware::class]);


        Route::resource('quick-links', AdminQuickLinkController::class)->except(['show']);
        Route::post('/quick-links/sort', [AdminQuickLinkController::class, 'updateSort'])->name('quick-links.sort');

        Route::resource('article-categories', AdminArticleCategoryController::class);
        Route::prefix('article/')->as('article.')->group(function () {
            Route::resource('news', AdminNewsController::class)->except(['show']);
            Route::resource('blog', AdminBlogController::class)->except(['show']);
            Route::resource('press-releases', AdminPressReleaseController::class)->except(['show']);
        });

        Route::prefix('investor/')->as('investor.')->group(function () {
            Route::resource('reports', AdminInvestorReportController::class)->except(['show']);
        });

        Route::controller(AdminEditorController::class)
            ->prefix('editor')
            ->as('editor.')
            ->group(function () {
                Route::get('/token', 'token')->name('token');
                Route::post('/upload', 'upload')->name('upload')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
            });

    });
});
