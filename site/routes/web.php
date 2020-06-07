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


Route::get('/CheckoutIndex', 'CheckoutController@CheckoutIndex');


Route::get('/addCart/{id}', 'CartController@addCart');
Route::get('/updateCart', 'CartController@updateCart');
Route::get('/clearCart', 'CartController@clearCart');
Route::get('/getSubTotl', 'CartController@getSubTotl');

Route::post('/updateQty', 'CartController@updateQty');




Route::get('/RegiIndex', 'RegistrationController@RegiIndex');
Route::post('/insertData', 'RegistrationController@insertData');




Route::get('/LoginIndex', 'LoginController@LoginIndex');
Route::post('/onLogin', 'LoginController@onLogin');


Route::post('/getData', 'CheckoutController@getData');






