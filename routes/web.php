<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\TokoController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\TransactionController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\ProdukController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('produk');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/Transaction', [TransactionController::class, 'index'])->name('transaksi');

Route::post('/product/add_cart/{id}', [CartController::class, 'store'])->name('add_cart');

Route::post('/cart/delete/{id}', [CartController::class, 'destroy'])->name('hapus_cart');

Route::post('checkout', [OrderController::class, 'store'])->name('checkout');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:seller']], function() {
    Route::get('/seller/dashboard', [SellerController::class, 'index'])->name('seller');
    Route::get('/seller/product', [ProdukController::class, 'index'])->name('list');
    Route::post('/seller/product/add_product', [ProdukController::class, 'store'])->name('add_produk');
    Route::post('/seller/product/delete_product/{id}', [ProdukController::class, 'destroy'])->name('hapus_produk');
    Route::get('/seller/product/edit/{id}', [ProdukController::class, 'edit'])->name('edit_produk');
    Route::resource('produk', ProdukController::class);
});

Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/home/buat_toko', [TokoController::class, 'index'])->name('buat_toko');
});
