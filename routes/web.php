<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('orders', 'Admin\OrderController')->only(['index', 'show']);
    Route::patch('/orders/{id}/switchstatus', 'Admin\OrderController@switchStatus')->name('orders.switchstatus');
    Route::resource('users', 'Admin\UserController');
});

// front
Route::get('/', 'Front\HomeController@index');

// front profile
Route::get('/profiles', 'Front\ProfileController@index');
Route::get('/orders/{id}', 'Front\ProfileController@showOrder');

// cart
Route::get('/carts', 'Front\CartController@index')->name('carts');
Route::post('/carts/{product}', 'Front\CartController@store')->name('carts.store');
Route::delete('/carts/{id}', 'Front\CartController@destroy')->name('carts.destroy');
