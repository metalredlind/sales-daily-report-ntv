<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\BrandClientController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\MediaOrderController;
use App\Http\Controllers\ProposalSuratController;
use App\Http\Controllers\TargetSalesController;
use Illuminate\Support\Facades\Route;

//admin route
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//profile route
Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('password.update');

//brand client route
Route::resource('brand-client', BrandClientController::class);

//daily-report route
Route::resource('daily-report', DailyReportController::class);

//proposal-surat route
Route::resource('proposal-surat', ProposalSuratController::class);

//proposal-surat route
Route::resource('media-order', MediaOrderController::class);

//target route
Route::resource('target-sales', TargetSalesController::class);

Route::get('brand-client-data', [BrandClientController::class, 'getData'])->name('brand-client.data');