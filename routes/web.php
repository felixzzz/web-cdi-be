<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileStorageController;
use App\Http\Controllers\FrontEnd\HomePageController;
use App\Http\Controllers\FrontEnd\ContactUsPageController;
use App\Http\Controllers\FrontEnd\MediaPageController;

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/contact-us', [ContactUsPageController::class, 'index'])->name('contact-us');
Route::get('/media', [MediaPageController::class, 'index'])->name('media');

Route::get('/storage/{file}', [FileStorageController::class, 'preview'])->name('preview.storage');

require __DIR__.'/admin.php';
