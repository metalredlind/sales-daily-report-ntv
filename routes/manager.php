<?php

use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Manager\ManagerBrandClientController;
use App\Http\Controllers\Manager\ManagerDailyReportController;
use App\Http\Controllers\Manager\ManagerMediaOrderController;
use App\Http\Controllers\Manager\ManagerProposalSuratController;
use App\Http\Controllers\Manager\ManagerTargetController;
use App\Http\Controllers\ManagerProfileController;
use Illuminate\Support\Facades\Route;

//manager route
Route::get('dashboard', [ManagerController::class, 'dashboard'])->name('dashboard');

//profile route
Route::get('profile', [ManagerProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ManagerProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ManagerProfileController::class, 'updatePassword'])->name('password.update');

//brand client route
Route::resource('brand-client', ManagerBrandClientController::class);

//daily-report route
Route::resource('daily-report', ManagerDailyReportController::class);

//proposal-surat route
Route::resource('proposal-surat', ManagerProposalSuratController::class);

//proposal-surat route
Route::resource('media-order', ManagerMediaOrderController::class);

//target route
Route::resource('target-sales', ManagerTargetController::class);

//daterangefilter Datatables
Route::get('brand-client-data', [ManagerBrandClientController::class, 'getData'])->name('brand-client.data');
Route::get('daily-report-data', [ManagerDailyReportController::class, 'getData'])->name('daily-report.data');
Route::get('proposal-surat-data', [ManagerProposalSuratController::class, 'getData'])->name('proposal-surat.data');
Route::get('media-order-data', [ManagerMediaOrderController::class, 'getData'])->name('media-order.data');