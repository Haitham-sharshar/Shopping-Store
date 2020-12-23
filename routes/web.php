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



Route::get('login','Auth\LoginController@loginForm')->middleware('guest')->name('login');

Route::get('register','Auth\LoginController@registerForm')->middleware('guest')->name('register');
Route::post('register','Auth\LoginController@registerPost')->name('registerPost');


Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::post('login','Auth\LoginController@login')->name('loginForm');

 //Dashboard Route
Route::prefix('dashboard')->middleware('admin')->group(function(){
    Route::get('/','Dashboard\HomeController@index');
    Route::resource('users','Dashboard\UsersController');
    Route::resource('categories','Dashboard\CategoryController');
    Route::resource('products','Dashboard\ProductController');
    Route::resource('carts','Dashboard\CartController');
    Route::post('cart-update-status','Dashboard\CartController@updateStatus');
});

Route::prefix('site')->group(function(){
    Route::get('/','Site\HomeController@index');
    Route::get('single-page/{id}','Site\HomeController@singlePage')->name('singlePage');
    Route::get('add-to-cart/{id}','Site\CartController@addToCart')->name('addToCart');
    Route::get('Carts-Show','Site\CartController@showCart')->name('Cart');
    Route::post('cart','Site\CartController@cartStore')->name('cartStore');
    Route::get('pay-page','Site\CartController@cartConfirmation')->name('cartConfirmation');

    Route::get('decrease-cart-item-qty/{id}','Site\CartController@decreaseQty')->name('decreaseQty');
});


