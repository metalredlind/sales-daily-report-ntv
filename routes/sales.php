<?php

use App\Http\Controllers\Backend\SalesController;
use App\Http\Controllers\Sales\SalesBrandClientController;
use App\Http\Controllers\Sales\SalesDailyReportController;
use App\Http\Controllers\Sales\SalesMediaOrderController;
use App\Http\Controllers\Sales\SalesProposalSuratController;
use App\Http\Controllers\Sales\SalesTargetController;
use App\Http\Controllers\SalesProfileController;
use Illuminate\Support\Facades\Route;

//sales route
Route::get('dashboard', [SalesController::class, 'dashboard'])->name('dashboard');

//profile route
Route::get('profile', [SalesProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [SalesProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [SalesProfileController::class, 'updatePassword'])->name('password.update');

//brand client route
Route::resource('brand-client', SalesBrandClientController::class);

//daily-report route
Route::resource('daily-report', SalesDailyReportController::class);

//proposal-surat route
Route::resource('proposal-surat', SalesProposalSuratController::class);

//proposal-surat route
Route::resource('media-order', SalesMediaOrderController::class);

//target route
Route::resource('target-sales', SalesTargetController::class);

//daterangefilter Datatables
Route::get('brand-client-data', [SalesBrandClientController::class, 'getData'])->name('brand-client.data');
Route::get('daily-report-data', [SalesDailyReportController::class, 'getData'])->name('daily-report.data');
Route::get('proposal-surat-data', [SalesProposalSuratController::class, 'getData'])->name('proposal-surat.data');
Route::get('media-order-data', [SalesMediaOrderController::class, 'getData'])->name('media-order.data');