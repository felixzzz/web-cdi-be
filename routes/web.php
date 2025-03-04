<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileStorageController;
use App\Http\Controllers\FrontEnd\HomePageController;
use App\Http\Controllers\FrontEnd\ContactUsController;
use App\Http\Controllers\FrontEnd\GovernanceController;
use App\Http\Controllers\FrontEnd\Investor\InvestorFinancialController;
use App\Http\Controllers\FrontEnd\Investor\InvestorPublicationController;
use App\Http\Controllers\FrontEnd\Investor\InvestorReportController;
use App\Http\Controllers\FrontEnd\Investor\InvestorSharesController;
use App\Http\Controllers\FrontEnd\MediaController;

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/governance', [GovernanceController::class, 'index'])->name('governance');
Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::get('/investor/report', [InvestorReportController::class, 'index'])->name('investor.report');
Route::get('/investor/financial-information', [InvestorFinancialController::class, 'index'])->name('investor.financial-information');
Route::get('/investor/shares-information', [InvestorSharesController::class, 'index'])->name('investor.shares-information');
Route::get('/investor/publications-for-investors', [InvestorPublicationController::class, 'index'])->name('investor.publications-for-investors');

Route::get('/storage/{file}', [FileStorageController::class, 'preview'])->name('preview.storage');

require __DIR__.'/admin.php';
