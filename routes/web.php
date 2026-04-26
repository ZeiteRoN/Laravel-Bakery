<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
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

Route::get('/contact', [Controller::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';
