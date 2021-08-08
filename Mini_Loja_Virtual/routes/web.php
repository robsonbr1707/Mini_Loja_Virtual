<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\RecordsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (){

    Route::get('/create', [RecordsController::class, 'create'])->name('index.create');
    Route::post('/', [RecordsController::class, 'store'])->name('index.store');
    Route::delete('/{id}', [RecordsController::class, 'destroy'])->name('index.destroy');
    Route::get('/dashboard', [RecordsController::class, 'dashboard'])->name('index.dashboard');
    Route::get('/edit/{id}', [RecordsController::class, 'edit'])->name('index.edit');
    Route::put('/update/{id}', [RecordsController::class, 'update'])->name('index.update');
    Route::post('/like/{id}', [RecordsController::class, 'like_product']);

    Route::get('/cart', [CartController::class, 'cart'])->name('index.cart');
    Route::post('/cart/{id}', [CartController::class, 'cart_shopping']);
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete_cart']);
    Route::delete('/cart/buy/{id}', [CartController::class, 'buy_products']);

});

Route::get('/', [RecordsController::class, 'index'])->name('index.home');
Route::get('/{id}', [RecordsController::class, 'show'])->name('index.show');

