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

Route::get('/', 'HomeController@HomeIndex');


Route::get('/ShopIndex', 'ShopController@ShopIndex');
Route::get('/ShowProductBYID/{id}', 'ShopController@ShowProductBYID');


Route::get('/CartIndex', 'CartController@CartIndex');
