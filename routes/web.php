<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CustomerCatheringController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\Merchant\DashboardMerchantController;
use App\Http\Controllers\Merchant\MenuMerchantController;
use App\Http\Controllers\Merchant\MerchantOrderController;
use App\Http\Controllers\Merchant\ProfileMerchantController;
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
    Route::get('/dashboard', [DashboardMerchantController::class, 'index'])->name('merchant.dashboard');

    // profile Merchant
    Route::get('/profile', [ProfileMerchantController::class, 'index'])->name('merchant.profile');
    Route::put('/profile', [ProfileMerchantController::class, 'update'])->name('merchant.profile.update');
    Route::post('/profile/changeImage', [ProfileMerchantController::class, 'changeImage'])->name('merchant.profile.changeImage');
    Route::put('/profile/changePassword', [ProfileMerchantController::class, 'changePassword'])->name('merchant.profile.changePassword');

    // menu Merchant
    Route::get('/menu', [MenuMerchantController::class, 'index'])->name('merchant.menu');
    Route::get('/menu/create', [MenuMerchantController::class, 'create'])->name('merchant.menu.create');
    Route::post('/menu', [MenuMerchantController::class, 'store'])->name('merchant.menu.store');
    Route::get('/menu/{id}/edit', [MenuMerchantController::class, 'edit'])->name('merchant.menu.edit');
    Route::put('/menu/{id}', [MenuMerchantController::class, 'update'])->name('merchant.menu.update');
    Route::delete('/menu/{id}', [MenuMerchantController::class, 'destroy'])->name('merchant.menu.delete');

    // order Merchant
    Route::get('/order', [MerchantOrderController::class, 'index'])->name('merchant.order');
    Route::get('/order/{id}', [MerchantOrderController::class, 'show'])->name('merchant.order.show');
    Route::delete('/order/cancel/{id}', [MerchantOrderController::class, 'cancel'])->name('merchant.order.cancel');
    
});
Route::get('/viewInvoice/{id}', [MerchantOrderController::class, 'view'])->name('viewInvoice');

Route::prefix('customer')->middleware('customer')->group(function () {

    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');

    Route::get('/cathering', [CustomerCatheringController::class, 'index'])->name('customer.cathering');
    Route::get('/cathering/{id}', [CustomerCatheringController::class, 'show'])->name('customer.cathering.show');

    Route::get('/order', [CustomerOrderController::class, 'index'])->name('customer.order');
    Route::get('/order/create', [CustomerOrderController::class, 'create'])->name('customer.order.create');
    Route::get('/order/{id}', [CustomerOrderController::class, 'show'])->name('customer.order.show');
    Route::post('/order', [CustomerOrderController::class, 'store'])->name('customer.order.store');
    Route::get('/pay/{id}', [CustomerOrderController::class, 'pay'])->name('customer.order.pay');
    Route::post('/checkout', [CustomerOrderController::class, 'checkout'])->name('customer.order.checkout');
    Route::delete('/order/cancel/{id}', [CustomerOrderController::class, 'cancel'])->name('customer.order.cancel');
    

    // cart
    Route::get('/cart', [CartController::class, 'index'])->name('customer.cart');
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('customer.order.addToCart');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('customer.cart.remove');
    Route::get('/cart/get', [CartController::class, 'getCart'])->name('customer.cart.get');
    Route::post('/cart/modifyQuantity/{id}', [CartController::class, 'modifyQuantity'])->name('customer.cart.modifyQuantity');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('customer.cart.clear');
    

});

