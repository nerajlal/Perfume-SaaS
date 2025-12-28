<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/collections', [PageController::class, 'collection'])->name('collection');
Route::get('/products', [PageController::class, 'collection'])->name('products');
Route::get('/all-products', [PageController::class, 'allProducts'])->name('all-products');
Route::get('/cosmopolitan', [PageController::class, 'cosmopolitan'])->name('cosmopolitan');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Admin Routes (Auth Disabled for now)
// Route::prefix('admin')->name('admin.')->group(function () {
//     // Auth Routes
//     Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
//     Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.submit');
//     Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

//     // Protected Routes
//     Route::middleware('auth')->group(function () {
//         Route::view('/', 'admin.dashboard')->name('dashboard');
//     });
// });

// // Fallback for auth middleware if 'login' route is missing
// Route::get('/login', function() {
//     return redirect()->route('admin.login');
// })->name('login');

Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
Route::view('/admin/orders', 'admin.orders')->name('admin.orders');
Route::get('/admin/orders/{id}', function ($id) {
    return view('admin.orders.show', ['id' => $id]);
})->name('admin.orders.show');
Route::view('/admin/products', 'admin.products')->name('admin.products');
Route::view('/admin/customers', 'admin.customers')->name('admin.customers');
Route::view('/admin/analytics', 'admin.analytics')->name('admin.analytics');
Route::view('/admin/discounts', 'admin.discounts')->name('admin.discounts');
