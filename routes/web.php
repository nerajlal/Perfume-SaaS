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
Route::view('/cart', 'nurah.cart')->name('cart');
Route::view('/checkout', 'nurah.checkout')->name('checkout');

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

Route::get('/admin/collections', [App\Http\Controllers\Admin\CollectionController::class, 'index'])->name('admin.collections');
Route::get('/admin/collections/create', [App\Http\Controllers\Admin\CollectionController::class, 'create'])->name('admin.collections.create');
Route::post('/admin/collections', [App\Http\Controllers\Admin\CollectionController::class, 'store'])->name('admin.collections.store');
Route::get('/admin/collections/{id}', [App\Http\Controllers\Admin\CollectionController::class, 'show'])->name('admin.collections.show');
Route::get('/admin/collections/{id}/edit', [App\Http\Controllers\Admin\CollectionController::class, 'edit'])->name('admin.collections.edit');
Route::put('/admin/collections/{id}', [App\Http\Controllers\Admin\CollectionController::class, 'update'])->name('admin.collections.update');
Route::delete('/admin/collections/{id}', [App\Http\Controllers\Admin\CollectionController::class, 'destroy'])->name('admin.collections.destroy');

Route::get('/admin/bundles', [App\Http\Controllers\Admin\BundleController::class, 'index'])->name('admin.bundles');
Route::get('/admin/bundles/create', [App\Http\Controllers\Admin\BundleController::class, 'create'])->name('admin.bundles.create');
Route::post('/admin/bundles', [App\Http\Controllers\Admin\BundleController::class, 'store'])->name('admin.bundles.store');
Route::get('/admin/bundles/{id}/edit', [App\Http\Controllers\Admin\BundleController::class, 'edit'])->name('admin.bundles.edit');
Route::put('/admin/bundles/{id}', [App\Http\Controllers\Admin\BundleController::class, 'update'])->name('admin.bundles.update');
Route::delete('/admin/bundles/{id}', [App\Http\Controllers\Admin\BundleController::class, 'destroy'])->name('admin.bundles.destroy');

Route::get('/admin/attributes', [App\Http\Controllers\Admin\AttributeController::class, 'index'])->name('admin.attributes');
Route::post('/admin/attributes', [App\Http\Controllers\Admin\AttributeController::class, 'store'])->name('admin.attributes.store');
Route::put('/admin/attributes/{id}', [App\Http\Controllers\Admin\AttributeController::class, 'update'])->name('admin.attributes.update');
Route::delete('/admin/attributes/{id}', [App\Http\Controllers\Admin\AttributeController::class, 'destroy'])->name('admin.attributes.destroy');

Route::get('/admin/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products');
Route::get('/admin/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.destroy');

Route::view('/admin/reviews', 'admin.reviews.index')->name('admin.reviews');

Route::view('/admin/blog', 'admin.blog.index')->name('admin.blog');
Route::view('/admin/blog/create', 'admin.blog.create')->name('admin.blog.create');
Route::get('/admin/blog/{id}/edit', function ($id) {
    return view('admin.blog.edit', ['id' => $id]);
})->name('admin.blog.edit');


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

Route::get('/admin/settings/slider', [App\Http\Controllers\Admin\SliderController::class, 'index'])->name('admin.settings.slider');
Route::get('/admin/settings/slider/create', [App\Http\Controllers\Admin\SliderController::class, 'create'])->name('admin.settings.slider.create');
Route::post('/admin/settings/slider', [App\Http\Controllers\Admin\SliderController::class, 'store'])->name('admin.settings.slider.store');
Route::post('/admin/settings/slider/reorder', [App\Http\Controllers\Admin\SliderController::class, 'reorder'])->name('admin.settings.slider.reorder');
Route::delete('/admin/settings/slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('admin.settings.slider.destroy');

Route::view('/admin/settings/managers', 'admin.settings.managers.index')->name('admin.settings.managers');
Route::view('/admin/settings/managers/create', 'admin.settings.managers.create')->name('admin.settings.managers.create');
