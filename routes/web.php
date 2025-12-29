<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/collections', [PageController::class, 'collection'])->name('collection');
Route::get('/products', [PageController::class, 'collection'])->name('products');
Route::get('/all-products', [PageController::class, 'allProducts'])->name('all-products');
Route::get('/cosmopolitan', [PageController::class, 'cosmopolitan'])->name('cosmopolitan');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::view('/about', 'nurah.about')->name('about');
Route::view('/contact', 'nurah.contact')->name('contact');

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

Route::view('/admin/bundles', 'admin.bundles.index')->name('admin.bundles');
Route::view('/admin/bundles/create', 'admin.bundles.create')->name('admin.bundles.create');
Route::get('/admin/bundles/{id}/edit', function ($id) {
    return view('admin.bundles.edit', ['id' => $id]);
})->name('admin.bundles.edit');

Route::view('/admin/products', 'admin.products')->name('admin.products');
Route::view('/admin/products/create', 'admin.products.create')->name('admin.products.create');
Route::get('/admin/products/{id}/edit', function ($id) {
    return view('admin.products.edit', ['id' => $id]);
})->name('admin.products.edit');

Route::view('/admin/reviews', 'admin.reviews.index')->name('admin.reviews');

Route::view('/admin/blog', 'admin.blog.index')->name('admin.blog');
Route::view('/admin/blog/create', 'admin.blog.create')->name('admin.blog.create');
Route::get('/admin/blog/{id}/edit', function ($id) {
    return view('admin.blog.edit', ['id' => $id]);
})->name('admin.blog.edit');
Route::view('/admin/attributes', 'admin.attributes.index')->name('admin.attributes');

Route::view('/admin/customers', 'admin.customers')->name('admin.customers');
Route::view('/admin/customers/create', 'admin.customers.create')->name('admin.customers.create');
Route::get('/admin/customers/{id}', function ($id) {
    return view('admin.customers.show', ['id' => $id]);
})->name('admin.customers.show');

Route::view('/admin/analytics', 'admin.analytics')->name('admin.analytics');
Route::get('/admin/analytics/{type}', function ($type) {
    $titles = [
        'sales' => ['title' => 'Total Sales', 'value' => '₹45,231.00', 'metricLabel' => 'Revenue'],
        'orders' => ['title' => 'Total Orders', 'value' => '342', 'metricLabel' => 'Orders'],
        'aov' => ['title' => 'Average Order Value', 'value' => '₹1,250.00', 'metricLabel' => 'Order Value'],
        'sessions' => ['title' => 'Online Store Sessions', 'value' => '10,234', 'metricLabel' => 'Sessions'],
    ];

    $data = $titles[$type] ?? ['title' => 'Report', 'value' => '0', 'metricLabel' => 'Count'];

    return view('admin.analytics.report', $data);
})->name('admin.analytics.show');
Route::view('/admin/discounts', 'admin.discounts')->name('admin.discounts');
Route::view('/admin/discounts/create', 'admin.discounts.create')->name('admin.discounts.create');
Route::get('/admin/discounts/{id}/edit', function ($id) {
    return view('admin.discounts.edit', ['id' => $id]);
})->name('admin.discounts.edit');

Route::view('/admin/settings/slider', 'admin.settings.slider')->name('admin.settings.slider');
Route::view('/admin/settings/slider/create', 'admin.settings.slider_create')->name('admin.settings.slider.create');

Route::view('/admin/settings/managers', 'admin.settings.managers.index')->name('admin.settings.managers');
Route::view('/admin/settings/managers/create', 'admin.settings.managers.create')->name('admin.settings.managers.create');
