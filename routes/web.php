<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('about');
});

Route::view('/home','home')->name('home')->middleware('auth');

Route::get('/register', [RegisterController::class,'index'])->name('register.form');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');

Route::get('/login', [LoginController::class,'index'])->name('login.form');
Route::post('/login', [LoginController::class,'login'])->name('login');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/catalog', [CatalogController::class,'index'])->name('catalog');

Route::middleware('auth')->group(function(){
    Route::get('/cart', [CartController::class,'index'])->name('cart');
    Route::get('/add/{id}', [CartController::class,'addToCart'])->name('addToCart');
    Route::get('/remove/{id}', [CartController::class,'removeFromCart'])->name('removeFromCart');
    Route::get('/delete/{id}', [CartController::class,'deleteFromCart'])->name('deleteFromCart');

    Route::get('/orders', [OrderController::class,'index'])->name('orders');
    Route::post('/order/create', [OrderController::class,'orderCreate'])->name('order.create');
    Route::post('/order/deleteOrder/{id}', [OrderController::class,'deleteOrder'])->name('order.delete');
});

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('admin.index');
    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::get('/create', [CategoryController::class,'create'])->name('category.create');
        Route::post('/store', [CategoryController::class,'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class,'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('category.destroy');
    });
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class,'index'])->name('product.index');
        Route::get('/create', [ProductController::class,'create'])->name('product.create');
        Route::post('/store', [ProductController::class,'store'])->name('product.store');
        Route::get('/{id}', [ProductController::class,'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class,'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class,'destroy'])->name('product.destroy');
    });
});
