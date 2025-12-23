<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ProductController,
    CategoryController,
    BrandController,
    CartController,
    WishlistController,
    CheckoutController
};

// Main Storefront Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/category/{category}', [ProductController::class, 'category'])->name('products.category');

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Brand Routes
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/{slug}', [BrandController::class, 'show'])->name('brands.show');

// Cart Routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

// Wishlist Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::post('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});

// Checkout Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
});

// User Dashboard Routes (from Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth Routes (keep Breeze's auth routes)
require __DIR__.'/auth.php';

// Debug route
Route::get('/debug', function() {
    return response()->json([
        'routes' => [
            'home' => route('home'),
            'products.index' => route('products.index'),
            'products.show' => route('products.show', ['id' => 1]),
            'products.category' => route('products.category', ['category' => 'phones']),
            'cart.index' => route('cart.index'),
            'wishlist.index' => route('wishlist.index'),
            'checkout.index' => route('checkout.index'),
        ]
    ]);
});