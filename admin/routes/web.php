<?php

use Illuminate\Support\Facades\Route;




Route::get('/','HomeController@HomeIndex');
Route::get('/visitors','VisitorController@VisitorIndex');


Route::get('/ArrivalIndex','NewArrivalController@ArrivalIndex');
Route::get('/getArrivalData','NewArrivalController@getArrivalData');
Route::post('/deleteArrivalData','NewArrivalController@deleteArrivalData');
Route::post('/getDetails','NewArrivalController@getDetails');
Route::post('/updateDetails','NewArrivalController@updateDetails');
Route::post('/insertProduct','NewArrivalController@insertProduct');
