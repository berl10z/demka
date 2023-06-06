<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;


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

Route::get('/catalog', [ProductController::class,'index'])->name('catalog');
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/add/{id}', [CartController::class,'addToCart'])->name('addToCart');
Route::get('/remove/{id}', [CartController::class,'removeFromCart'])->name('removeFromCart');
Route::get('/delete/{id}', [CartController::class,'deleteFromCart'])->name('deleteFromCart');