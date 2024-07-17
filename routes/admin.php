<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\BrandClientController;
use Illuminate\Support\Facades\Route;

//admin route
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//profile route
Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('password.update');

//brand client route
Route::resource('brand-client', BrandClientController::class);
