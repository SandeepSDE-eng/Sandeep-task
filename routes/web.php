<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;


use App\Http\Controllers\AdminController;




Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    // Define the admin dashboard route
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/cart', [CartController::class, 'list'])->name('cart.index');
Route::get('/cart-create', [CartController::class, 'list'])->name('cart.create');
// Product APIs
Route::get('api/products', [ProductController::class, 'list']);
Route::post('api/products', [ProductController::class, 'store']);


// Cart APIs
Route::post('api/cart', [CartController::class, 'add']);
Route::get('api/cart', [CartController::class, 'list']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
