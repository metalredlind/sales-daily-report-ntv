<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\BrandClientController;
use Illuminate\Support\Facades\Route;

//admin route
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//profile route
Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');

//brand client route
Route::get('brand-client', [BrandClientController::class, 'index'])->name('brand-client');

