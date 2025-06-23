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
use App\Http\Controllers\FrontEnd\Sustainability\SustainabilityController;
use App\Http\Controllers\FrontEnd\Sustainability\SustainabilityEnvironmentController;
use App\Http\Controllers\FrontEnd\Sustainability\SustainabilityGovernanceController;
use App\Http\Controllers\FrontEnd\Sustainability\SustainabilityInActionController;
use App\Http\Controllers\FrontEnd\Sustainability\SustainabilityReportPublicationController;
use App\Http\Controllers\FrontEnd\Sustainability\SustainabilitySocialController;
use App\Http\Controllers\FrontEnd\UtilityController;

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('contact-us/store', [ContactUsController::class, 'store'])->name("contact-us.store");

Route::prefix('governance')
->as("governance.")
->group(function () {
    Route::get('/', [GovernanceController::class, 'index'])->name('index');
    Route::get('/whistleblowing', [GovernanceController::class, 'whistleblowing'])->name('whistleblowing');
    Route::post('/whistleblowing-store', [GovernanceController::class, 'whistleblowingStore'])->name('whistleblowing.store');
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
    Route::get('/management/team/{team}', [ManagementController::class, 'team'])->name('team');
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

Route::prefix('sustainability')
->as("sustainability.")
->group(function () {
    Route::get('/', [SustainabilityController::class, 'index'])->name('overview');
    Route::get('/sustainability-in-action', [SustainabilityInActionController::class, 'index'])->name('sustainability-in-action');
    Route::get('/report-and-publication', [SustainabilityReportPublicationController::class, 'index'])->name('report-and-publication');
    Route::get('/environment', [SustainabilityEnvironmentController::class, 'index'])->name('environment');
    Route::get('/social', [SustainabilitySocialController::class, 'index'])->name('social');
    Route::get('/governance', [SustainabilityGovernanceController::class, 'index'])->name('governance');
});

Route::get('/file-storage/{file?}', [FileStorageController::class, 'preview'])->name('preview.storage');
Route::get('/file-download/{file?}', [FileStorageController::class, 'download'])->name('preview.download');

Route::get('/file/preview/{lang?}/{type?}/{key?}/{name?}', [FileStorageController::class, 'filePreview'])->name('file.preview');
Route::get('/file/download/{lang?}/{type?}/{key?}/{name?}', [FileStorageController::class, 'fileDownload'])->name('file.download');

Route::get('/privacy-policy', [UtilityController::class, 'privacy'])->name('privacy-policy');
Route::get('/cookies-notice', [UtilityController::class, 'cookie'])->name('cookies-notice');
Route::get('/terms-and-conditions', [UtilityController::class, 'term'])->name('terms-and-conditions');
Route::get('/disclaimer', [UtilityController::class, 'disclaimer'])->name('disclaimer');
Route::get('/switch-lang/{locale}', [UtilityController::class, 'switchLang'])->name('switch-lang');
