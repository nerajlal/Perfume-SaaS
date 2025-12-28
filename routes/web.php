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

Route::view('/admin/collections', 'admin.collections.index')->name('admin.collections');
Route::view('/admin/collections/create', 'admin.collections.create')->name('admin.collections.create');
Route::get('/admin/collections/{id}', function ($id) {
    return view('admin.collections.show', ['id' => $id]);
})->name('admin.collections.show');

Route::view('/admin/products', 'admin.products')->name('admin.products');
Route::view('/admin/products/create', 'admin.products.create')->name('admin.products.create');
Route::get('/admin/products/{id}/edit', function ($id) {
    return view('admin.products.edit', ['id' => $id]);
})->name('admin.products.edit');

Route::view('/admin/customers', 'admin.customers')->name('admin.customers');
Route::view('/admin/customers/create', 'admin.customers.create')->name('admin.customers.create');
Route::view('/admin/customers/import', 'admin.customers.import')->name('admin.customers.import');
Route::get('/admin/customers/{id}', function ($id) {
    return view('admin.customers.show', ['id' => $id]);
})->name('admin.customers.show');

Route::view('/admin/analytics', 'admin.analytics')->name('admin.analytics');
Route::view('/admin/discounts', 'admin.discounts')->name('admin.discounts');
