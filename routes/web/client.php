<?php

use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/show/{id}', [ProductController::class, 'productShow'])->name('show');
});
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrderController::class, 'orderIndex'])->name('index');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
});
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/show/{id}', [CategoryController::class, 'categoryShow'])->name('show');
});
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ru', 'tm'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang');