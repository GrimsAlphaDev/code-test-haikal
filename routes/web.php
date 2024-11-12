<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// route group for guest middleware
Route::middleware('customGuest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('landing');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'signIn'])->name('signIn');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'signUp'])->name('signUp');
});

// prefix for merchant
Route::prefix('merchant')->middleware('merchant')->group(function () {
    // Route::get('/dashboard', [AuthController::class, 'dashboardMerchant'])->name('merchant.dashboard');
    Route::get('/dashboard', function(){
        return "Merchant Dashboard";
    })->name('merchant.dashboard');
});

Route::prefix('customer')->middleware('customer')->group(function () {
    // Route::get('/dashboard', [AuthController::class, 'dashboardCustomer'])->name('customer.dashboard');
    Route::get('/dashboard', function(){
        return "Customer Dashboard";
    })->name('customer.dashboard');
});

