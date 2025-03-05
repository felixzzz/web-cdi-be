<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileStorageController;
use App\Http\Controllers\FrontEnd\MediaController;
use App\Http\Controllers\FrontEnd\HomePageController;
use App\Http\Controllers\FrontEnd\ContactUsController;
use App\Http\Controllers\FrontEnd\GovernanceController;
use App\Http\Controllers\FrontEnd\AboutUs\AboutUsController;
use App\Http\Controllers\FrontEnd\AboutUs\AwardsController;
use App\Http\Controllers\FrontEnd\AboutUs\ManagementController;
use App\Http\Controllers\FrontEnd\Investor\InvestorReportController;
use App\Http\Controllers\FrontEnd\Investor\InvestorSharesController;
use App\Http\Controllers\FrontEnd\Investor\InvestorFinancialController;
use App\Http\Controllers\FrontEnd\Investor\InvestorPublicationController;

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/governance', [GovernanceController::class, 'index'])->name('governance');
Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

Route::prefix('investor')
->as("investor.")
->group(function () {
    Route::get('/report', [InvestorReportController::class, 'index'])->name('report');
    Route::get('/financial-information', [InvestorFinancialController::class, 'index'])->name('financial-information');
    Route::get('/shares-information', [InvestorSharesController::class, 'index'])->name('shares-information');
    Route::get('/publications-for-investors', [InvestorPublicationController::class, 'index'])->name('publications-for-investors');
});

Route::prefix('about-us')
->as("about-us.")
->group(function () {
    Route::get('/', [AboutUsController::class, 'index'])->name('who-we-are');
    Route::get('/awards', [AwardsController::class, 'index'])->name('awards');
    Route::get('/management', [ManagementController::class, 'index'])->name('management');
});



Route::get('/storage/{file}', [FileStorageController::class, 'preview'])->name('preview.storage');

require __DIR__.'/admin.php';
