<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Tenant Scoped Routes (Loaded via Prefix OR Domain)

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/collections', [PageController::class, 'collection'])->name('collection');
Route::get('/products', [PageController::class, 'collection'])->name('products');
Route::get('/all-products', [PageController::class, 'allProducts'])->name('all-products');
Route::get('/combos', [PageController::class, 'combos'])->name('combos');
Route::get('/combo', [PageController::class, 'combo'])->name('combo');
Route::get('/cosmopolitan', [PageController::class, 'cosmopolitan'])->name('cosmopolitan');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::view('/about', 'nurah.about')->name('about');
Route::view('/contact', 'nurah.contact')->name('contact');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/shipping-policy', [PageController::class, 'shippingPolicy'])->name('shipping-policy');
Route::get('/return-policy', [PageController::class, 'returnPolicy'])->name('return-policy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms-of-service');

Route::post('/order/place', [App\Http\Controllers\OrderController::class, 'store'])->name('order.place');

// Account Routes
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index')->middleware('auth');
Route::post('/account/address', [App\Http\Controllers\AccountController::class, 'updateAddress'])->name('account.address.update')->middleware('auth');
Route::get('/account/orders', [App\Http\Controllers\AccountController::class, 'orders'])->name('account.orders')->middleware('auth');

// User Auth Routes
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Google Auth
Route::get('auth/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback']);
