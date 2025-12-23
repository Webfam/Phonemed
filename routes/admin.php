<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\{
    LoginController,
    ForgotPasswordController,
    ResetPasswordController
};
use App\Http\Controllers\Admin\{
    DashboardController,
    ProductController,
    CategoryController,
    BrandController,
    OrderController,
    CustomerController,
    PaymentController,
    ReportController,
    DeliveryController,
    SettingController,
    AuditLogController,
    PromotionController
};

// Admin Auth Routes (Public - accessible without login)
Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Password Reset Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
});

// Admin Protected Routes (Require admin authentication)
Route::middleware(['auth:admin'])->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Products Management
    Route::resource('products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);
    
    // Product Images
    Route::post('products/{product}/images', [ProductController::class, 'uploadImages'])->name('admin.products.images');
    Route::delete('products/{product}/images/{image}', [ProductController::class, 'deleteImage'])->name('admin.products.images.delete');
    
    // Product Variants
    Route::get('products/{product}/variants', [ProductController::class, 'variants'])->name('admin.products.variants');
    Route::post('products/{product}/variants', [ProductController::class, 'storeVariant'])->name('admin.products.variants.store');
    Route::put('variants/{variant}', [ProductController::class, 'updateVariant'])->name('admin.variants.update');
    Route::delete('variants/{variant}', [ProductController::class, 'destroyVariant'])->name('admin.variants.destroy');
    
    // Categories Management
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);
    Route::post('categories/reorder', [CategoryController::class, 'reorder'])->name('admin.categories.reorder');
    
    // Brands Management
    Route::resource('brands', BrandController::class)->names([
        'index' => 'admin.brands.index',
        'create' => 'admin.brands.create',
        'store' => 'admin.brands.store',
        'show' => 'admin.brands.show',
        'edit' => 'admin.brands.edit',
        'update' => 'admin.brands.update',
        'destroy' => 'admin.brands.destroy',
    ]);
    
    // Orders Management
    Route::resource('orders', OrderController::class)->names([
        'index' => 'admin.orders.index',
        'create' => 'admin.orders.create',
        'store' => 'admin.orders.store',
        'show' => 'admin.orders.show',
        'edit' => 'admin.orders.edit',
        'update' => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
    ]);
    Route::get('orders/{order}/invoice', [OrderController::class, 'invoice'])->name('admin.orders.invoice');
    Route::post('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    
    // Customers Management
    Route::resource('customers', CustomerController::class)->names([
        'index' => 'admin.customers.index',
        'create' => 'admin.customers.create',
        'store' => 'admin.customers.store',
        'show' => 'admin.customers.show',
        'edit' => 'admin.customers.edit',
        'update' => 'admin.customers.update',
        'destroy' => 'admin.customers.destroy',
    ]);
    Route::get('customers/{customer}/orders', [CustomerController::class, 'orders'])->name('admin.customers.orders');
    
    // Payments Management
    Route::get('payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('payments/{payment}', [PaymentController::class, 'show'])->name('admin.payments.show');
    
    // Deliveries Management
    Route::get('deliveries', [DeliveryController::class, 'index'])->name('admin.deliveries.index');
    Route::get('deliveries/{delivery}', [DeliveryController::class, 'show'])->name('admin.deliveries.show');
    
    // Reports
    Route::prefix('reports')->name('admin.reports.')->group(function () {
        Route::get('sales', [ReportController::class, 'sales'])->name('sales');
        Route::get('products', [ReportController::class, 'products'])->name('products');
    });
    
    // Settings
    Route::prefix('settings')->name('admin.settings.')->group(function () {
        Route::get('general', [SettingController::class, 'general'])->name('general');
        Route::put('general', [SettingController::class, 'updateGeneral'])->name('general.update');
    });
    
    // Audit Logs
    Route::get('audit-logs', [AuditLogController::class, 'index'])->name('admin.audit-logs.index');
    
    // Promotions
    Route::resource('promotions', PromotionController::class)->names([
        'index' => 'admin.promotions.index',
        'create' => 'admin.promotions.create',
        'store' => 'admin.promotions.store',
        'show' => 'admin.promotions.show',
        'edit' => 'admin.promotions.edit',
        'update' => 'admin.promotions.update',
        'destroy' => 'admin.promotions.destroy',
    ]);
});
// Temporary route for M-Pesa
Route::get('/mpesa-transactions', function() {
    return 'M-Pesa Transactions - Coming Soon';
})->name('admin.mpesa-transactions.index');

// Temporary route for Reports
Route::get('/reports/sales', function() {
    return 'Sales Reports - Coming Soon';
})->name('admin.reports.sales');

Route::get('/reports/products', function() {
    return 'Product Reports - Coming Soon';
})->name('admin.reports.products');
// Temporary routes for testing (remove later)
Route::get('/test', function () {
    return 'Admin routes are working!';
})->name('admin.test');