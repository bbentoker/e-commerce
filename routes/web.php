<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home.index');
});

Auth::routes();

Route::resource('home',App\Http\Controllers\HomeController::class);

Route::get('/buy/{sellerId}/{productId}',[App\Http\Controllers\BuyController::class,'buy'])->name('buy');
Route::get('/profile',[App\Http\Controllers\BuyController::class,'profile'])->name('profile');
Route::post('/buy/purchase',[App\Http\Controllers\BuyController::class,'purchase'])->name('purchase');