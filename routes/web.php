<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\TokoController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\TransactionController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\DeliverController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\ProdukController;
use App\Http\Controllers\Seller\WaitingController;

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

Route::post('transaksi', [TransactionController::class, 'store'])->name('bayar');

Route::post('/product/add_cart/{id}', [CartController::class, 'store'])->name('add_cart');

Route::get('/cart/delete/{id}', [CartController::class, 'destroy'])->name('hapus_cart');

Route::post('checkout', [OrderController::class, 'store'])->name('checkout');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('up_profil');

Route::get('/deliver', [DeliverController::class, 'index'])->name('deliver');

Route::post('/deliver/status/{id}', [DeliverController::class, 'store'])->name('selesai');

Route::get('/history', [HomeController::class, 'history'])->name('history');

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
    Route::get('/seller/pesanan', [WaitingController::class, 'index'])->name('pesanan');
    Route::get('/seller/pesanan/update/{id}', [WaitingController::class, 'update'])->name('upd_pesanan');
});

Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/home/buat_toko', [TokoController::class, 'index'])->name('buat_toko');
});
