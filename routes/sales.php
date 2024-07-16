<?php

use App\Http\Controllers\Backend\SalesController;
use Illuminate\Support\Facades\Route;

//sales route
Route::get('dashboard', [SalesController::class, 'dashboard'])->name('dashboard');