<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/admin', 'admin')->name('user.admin');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/','index')->name('product.index');
    Route::get('/product/{product}','show')->name('product.show');
    Route::post('/product','store')->name('product.store');
    Route::put('/product/{product}', 'update')->name('product.update');
    Route::delete('/product/{product}', 'destroy')->name('product.destroy');
});
Route::controller(CategoryController::class)->group(function () {
   Route::get('/category','index')->name('category.index');
   Route::get('/category/{category}','show')->name('category.show');
});

Route::controller(ReviewController::class)->group(function () {
    Route::post('/reviews', 'store')->name('reviews.store');
    Route::delete('/reviews/{review}', 'destroy')->name('reviews.destroy');
});

Route::middleware('auth')->controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/add', 'add')->name('cart.add');
    Route::put('/cart/{cartItemId}', 'update')->name('cart.update');
    Route::delete('/cart/{cartItemId}', 'remove')->name('cart.remove');
    Route::get('/cart/counter', 'getCounter')->name('cart.counter');
});

Route::middleware('auth')->controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders.index');
    Route::get('/orders/{orderId}', 'show')->name('orders.show');
    Route::post('/checkout', 'checkout')->name('checkout');
    Route::put('/orders/{orderId}/status', 'updateStatus')->name('orders.updateStatus');
});

Route::middleware('auth')->controller(OrderController::class)->group(function () {
    Route::get('/admin/orders', 'adminIndex')->name('admin.orders.index');
});

Route::get('/contact', [Controller::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';
