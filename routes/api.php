<?php

use Illuminate\Support\Facades\Route;

// Public API routes (no authentication needed)
Route::get('/products', [\App\Http\Controllers\API\ProductController::class, 'index']);
Route::get('/products/{slug}', [\App\Http\Controllers\API\ProductController::class, 'show']);
Route::get('/categories', [\App\Http\Controllers\API\CategoryController::class, 'index']);

// If you need authenticated API routes, you can use session-based auth
Route::middleware(['auth', 'verified'])->group(function () {
    // Customer API routes
    Route::get('/customer/orders', [\App\Http\Controllers\API\OrderController::class, 'customerOrders']);
    Route::post('/orders', [\App\Http\Controllers\API\OrderController::class, 'store']);
    Route::get('/orders/{order}', [\App\Http\Controllers\API\OrderController::class, 'show']);
});