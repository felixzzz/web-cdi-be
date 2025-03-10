<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Role\AdminRoleController;
use App\Http\Controllers\Admin\User\AdminUserController;
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

    });
});
