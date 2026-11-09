<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuth\LoginController;

// ==========================================
// 0. RUTE SPLASH SCREEN (Halaman Pertama)
// ==========================================
Route::get('/', function () {
    return view('splash');
})->name('splash');


// ==========================================
// 1. RUTE PUBLIC (Bisa diakses tanpa login)
// ==========================================
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/kategori/{slug?}', [HomeController::class, 'category'])->name('category');
Route::get('/produk/{slug}', [HomeController::class, 'show'])->name('product.detail');

// Halaman Statis (Notifikasi, Tentang, Syarat)
Route::get('/notifikasi', function () {
    return view('notifications');
})->name('notifications');

Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');

Route::get('/syarat-ketentuan', function () {
    return view('terms');
})->name('terms');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout & Lacak (Guest Checkout)
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{invoice}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/lacak-pesanan', [CheckoutController::class, 'track'])->name('track.index');
Route::post('/lacak-pesanan', [CheckoutController::class, 'trackResult'])->name('track.result');


// ==========================================
// 2. RUTE MEMBER (Hanya bisa diakses jika login sebagai Member)
// ==========================================
Route::middleware('auth:member')->group(function () {
    Route::get('/account', function () {
        return view('account');
    })->name('account');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==========================================
// 3. RUTE LOGIN ADMIN (Bisa diakses tanpa login)
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});


// ==========================================
// 4. RUTE ADMIN (Hanya bisa diakses jika login sebagai Admin)
// ==========================================
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    // Logout Admin
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // API Filter Kategori
    Route::get('/api/categories/{brand_id}', [ProductController::class, 'getCategoriesByBrand'])->name('api.categories');

    // Produk Admin
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Pesanan Admin
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});


// ==========================================
// 5. RUTE LOGIN/REGISTER MEMBER (Bawaan Breeze)
// ==========================================
require __DIR__.'/auth.php';