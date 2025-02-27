<?php

use App\Http\Controllers\FileStorageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

})->name('home');

Route::get('/storage/{file}', [FileStorageController::class, 'preview'])->name('preview.storage');

require __DIR__.'/admin.php';
