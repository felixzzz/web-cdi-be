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
use App\Http\Controllers\FrontEnd\OurBusiness\EnergyController;
use App\Http\Controllers\FrontEnd\OurBusiness\LogisticController;
use App\Http\Controllers\FrontEnd\OurBusiness\OurBusinessController;
use App\Http\Controllers\FrontEnd\OurBusiness\PortStorageController;
use App\Http\Controllers\FrontEnd\OurBusiness\WaterController;
use App\Http\Controllers\FrontEnd\UtilityController;

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

Route::prefix('governance')
->as("governance.")
->group(function () {
    Route::get('/', [GovernanceController::class, 'index'])->name('index');
    Route::get('/whistleblowing', [GovernanceController::class, 'whistleblowing'])->name('whistleblowing');
    Route::get('/{type}', [GovernanceController::class, 'type'])->name('type')->whereIn("type", ['policy', 'risk-management', 'code-of-conduct', 'she-regulation']);
});

Route::prefix('media')
->as("media.")
->group(function () {
    Route::get('/{type}', [MediaController::class, 'index'])->name('index')->whereIn("type", ["news", "blog", "press-release"]);
    Route::get('/{type}/{id}', [MediaController::class, 'detail'])->name('detail');
});

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

Route::prefix('our-business')
->as("our-business.")
->group(function () {
    Route::get('/', [OurBusinessController::class, 'index'])->name('what-we-do');
    Route::get('/logistics', [LogisticController::class, 'index'])->name('logistics');
    Route::get('/water', [WaterController::class, 'index'])->name('water');
    Route::get('/energy', [EnergyController::class, 'index'])->name('energy');
    Route::get('/ports-and-storage', [PortStorageController::class, 'index'])->name('ports-and-storage');
});

Route::get('/storage/{file}', [FileStorageController::class, 'preview'])->name('preview.storage');

require __DIR__.'/admin.php';
