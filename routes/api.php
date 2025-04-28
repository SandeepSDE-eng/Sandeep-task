<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;


// Product APIs
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

// Cart APIs
Route::post('/cart', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'list']);
