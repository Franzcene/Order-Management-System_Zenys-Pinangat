<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomeStatementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SalesReportController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::middleware('auth', 'rolemiddleware:admin')->group(function () {

    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('dashboard');

    });

    Route::controller(ProductController::class)->group(function() {
        Route::get('/products', 'index')->name('products.index');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        Route::get('/products/{product}/edit', 'edit')->name('products.edit');
        Route::put('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    });

    Route::controller(MaterialController::class)->group(function() {
        Route::get('/materials', 'index')->name('materials.index');
        Route::get('/materials/create', 'create')->name('materials.create');
        Route::post('/materials', 'store')->name('materials.store');
        Route::get('/materials/{material}/edit', 'edit')->name('materials.edit');
        Route::put('/materials/{material}', 'update')->name('materials.update');
        Route::delete('/materials/{material}', 'destroy')->name('materials.destroy');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit');
        Route::put('/users/{user}', 'update')->name('users.update');
        Route::delete('/users/{user}', 'destroy')->name('users.destroy');
    });

    Route::controller(OrderController::class)->group(function() {
        Route::get('/orders', 'index')->name('orders.index');
        Route::get('/orders/create', 'create')->name('orders.create');
        Route::post('/orders', 'store')->name('orders.store');
        Route::get('/orders/{order}/edit', 'edit')->name('orders.edit');
        Route::put('/orders/{order}', 'update')->name('orders.update');
        Route::delete('/orders/{order}', 'destroy')->name('orders.destroy');
        Route::get('/orders/{order}/show', 'show')->name('orders.show');
    });

    Route::get('/sales-report', [SalesReportController::class, 'generateReport']);

    Route::get('/income-statement', [IncomeStatementController::class, 'index'])->name('income-statement');
    Route::get('/income-statement-pdf', [IncomeStatementController::class, 'generatePdf'])->name('income-statement.pdf');


    Route::get('/messages', [ContactController::class, 'index'])->name('messages');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

});

Route::middleware('auth', 'rolemiddleware:customer')->group(function () {
    Route::controller(CartController::class)->group(function() {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/create', 'create')->name('cart.create');
        Route::post('/cart/place-order', 'placeOrder')->name('cart.placeOrder');
        Route::post('/cart/update-quantity', 'updateQuantity')->name('cart.updateQuantity');
        Route::delete('/carts/{cartItem}', 'destroy')->name('cart.destroy');
        // Route::post('/cart', 'store')->name('cart.store');
        // Route::get('/cart/{cart}/edit', 'edit')->name('cart.edit');
        // Route::put('/cart/{cart}', 'update')->name('cart.update');
        // Route::delete('/cart/{cart}', 'destroy')->name('cart.destroy');
    });

    Route::controller(CustomerProductController::class)->group(function() {
        Route::get('/customer/products', 'index')->name('customer.products.index');

    });

    Route::controller(CustomerOrderController::class)->group(function() {
        Route::get('/customer/order/{order}', 'show')->name('customer.order.show');
        Route::get('/customer/orders', 'index')->name('customer.orders.index');
        Route::delete('/customer/orders/{order}', 'destroy')->name('customer.orders.destroy');
        Route::get('/customer/orders/pending', 'pending')->name('customer.orders.pending');
        Route::get('/customer/orders/to-ship', 'toShip')->name('customer.orders.toShip');
        Route::get('/customer/orders/delivered', 'delivered')->name('customer.orders.delivered');
        Route::get('/customer/orders/cancelled', 'cancelled')->name('customer.orders.cancelled');
        Route::post('/customer/{id}/cancel', 'cancel')->name('orders.cancel');
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'edit')->name('customer.profile.edit');
        Route::put('/profile', 'update')->name('customer.profile.update');
    });

    Route::controller(CheckoutController::class)->group(function() {
        Route::post('/checkout', 'index')->name('checkout.index');
        Route::post('/checkout/process', 'processCheckout')->name('checkout.process');
    });
});


require __DIR__.'/auth.php';
