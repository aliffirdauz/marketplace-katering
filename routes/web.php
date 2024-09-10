<?php

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'merchant'])->group(function () {
    Route::get('/', [MerchantController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/menu', [MenuController::class, 'index'])->name('menus.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menus.show');
    Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::patch('/menu/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

    Route::get('/transaction', [MerchantController::class, 'order'])->name('order');
});

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/order', [CustomerController::class, 'index'])->name('order');
    Route::get('/order/show', [CustomerController::class, 'show'])->name('order.show');
    Route::post('/order/store', [CustomerController::class, 'store'])->name('order.store');

    Route::get('/order/history', [CustomerController::class, 'history'])->name('order.history');
    
});
Route::get('order/invoice/{id}', [CustomerController::class, 'invoice'])->name('order.invoice')->middleware('auth');

Route::get('register-merchant', [MerchantController::class, 'create'])
    ->middleware('guest')
    ->name('register.merchant');

Route::post('register-merchant', [MerchantController::class, 'store'])
    ->middleware('guest')
    ->name('register.merchant.store');

require __DIR__ . '/auth.php';
