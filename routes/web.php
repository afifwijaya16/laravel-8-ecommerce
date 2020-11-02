<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdmin;
use App\Http\Livewire\Home;
use App\Http\Livewire\ProductIndex;
use App\Http\Livewire\ProductCategory;
use App\Http\Livewire\ProductDetail;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\History;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', Home::class)->name('halamanutama');
Route::get('/products', ProductIndex::class)->name('products');
Route::get('/products/category/{categoryId}', ProductCategory::class)->name('products.category');
Route::get('/products/{id}', ProductDetail::class)->name('products.detail');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/history', History::class)->name('history');

Auth::routes();

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user.login');
Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'logoutUser'])->name('user.logout');

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/login', [AuthAdmin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthAdmin\LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthAdmin\LoginController::class, 'logout'])->name('admin.logout');
});




