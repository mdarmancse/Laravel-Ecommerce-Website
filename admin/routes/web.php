<?php

use Illuminate\Support\Facades\Route;




Route::get('/','HomeController@HomeIndex');
Route::get('/visitors','VisitorController@VisitorIndex');
