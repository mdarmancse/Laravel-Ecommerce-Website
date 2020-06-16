<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@HomeIndex');


Route::get('/ShopIndex', 'ShopController@ShopIndex');
Route::get('/ShowProductBYID/{id}', 'ShopController@ShowProductBYID');
//Route::get('/modalData/{id}', 'ShopController@modalData');
Route::post('/modalData', 'ShopController@modalData');
Route::post('/modalColor', 'ShopController@modalColor');


Route::get('/CartIndex', 'CartController@CartIndex');


Route::get('/CheckoutIndex', 'CheckoutController@CheckoutIndex');


Route::get('/addCart/{id}', 'CartController@addCart');
Route::post('/addCartModal', 'CartController@addCartModal');
Route::get('/clearCart', 'CartController@clearCart');
Route::get('/getSubTotl', 'CartController@getSubTotl');
Route::post('/updateQty', 'CartController@updateQty');

Route::post('/insertShopping', 'CartController@insertShopping');
//oute::get('/getCartData', 'CartController@getCartData');





Route::get('/RegiIndex', 'RegistrationController@RegiIndex');
Route::post('/billing-add', 'RegistrationController@customerRegister');




Route::get('/LoginIndex', 'LoginController@LoginIndex');
Route::post('/onLogin', 'LoginController@onLogin');


Route::get('/getData', 'CheckoutController@getData');
Route::post('/updateData', 'CheckoutController@updateData');
//Route::get('/getCartData', 'CheckoutController@getCartData');










