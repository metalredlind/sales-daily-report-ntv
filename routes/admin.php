<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\BrandClientController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\ManageUserController;
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

/** manage user routes */
Route::get('manage-user', [ManageUserController::class, 'index'])->name('manage-user.index');
Route::get('manage-user/create', [ManageUserController::class, 'create'])->name('manage-user.create');
Route::post('manage-user/store', [ManageUserController::class, 'store'])->name('manage-user.store');
Route::get('manage-user/{id}/edit', [ManageUserController::class, 'edit'])->name('manage-user.edit');
Route::put('manage-user/{id}/update', [ManageUserController::class, 'update'])->name('manage-user.update');
Route::put('manage-user/{id}/update-password', [ManageUserController::class, 'updatePassword'])->name('manage-user.update-password');
Route::delete('manage-user/{id}', [ManageUserController::class, 'destroy'])->name('manage-user.destroy');

//daterangefilter Datatables
Route::get('brand-client-data', [BrandClientController::class, 'getData'])->name('brand-client.data');
Route::get('daily-report-data', [DailyReportController::class, 'getData'])->name('daily-report.data');
Route::get('proposal-surat-data', [ProposalSuratController::class, 'getData'])->name('proposal-surat.data');
Route::get('media-order-data', [MediaOrderController::class, 'getData'])->name('media-order.data');
