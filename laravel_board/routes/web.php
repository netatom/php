<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductApiController;

Route::get('/', function () {
    return view('welcome');
});

// web route
Route::resource('products', ProductController::class);

// api
Route::prefix('api')->middleware('api')->group(function () {
    Route::get('/products', [ProductApiController::class, 'index'])->name('api.products.index');
    Route::post('/products', [ProductApiController::class, 'store'])->name('api.products.store');
    Route::put('/products/{id}', [ProductApiController::class, 'update'])->name('api.products.update');
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy'])->name('api.products.destroy');
});

// alpine route
Route::view('/products-alpine', 'products.indexAlpine')->name('products.alpine');
