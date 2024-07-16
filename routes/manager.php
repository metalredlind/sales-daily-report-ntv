<?php

use App\Http\Controllers\Backend\ManagerController;
use Illuminate\Support\Facades\Route;

//manager route
Route::get('dashboard', [ManagerController::class, 'dashboard'])->name('dashboard');