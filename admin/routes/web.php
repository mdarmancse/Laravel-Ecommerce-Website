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




Route::get('/CategoriesIndex','CategoriesController@CategoriesIndex');
Route::get('/getCategoryData','CategoriesController@getCategoryData');
Route::get('/tt','CategoriesController@getCategoryData');
Route::post('/deleteCategoryData','CategoriesController@deleteCategoryData');
Route::post('/getCategoryDetails','CategoriesController@getCategoryDetails');
Route::post('/updateCategoryDetails','CategoriesController@updateCategoryDetails');
Route::post('/insertCategory','CategoriesController@insertCategory');


Route::get('/SubCategoriesIndex','SubCategoriesController@SubCategoriesIndex');
Route::get('/getSubCategoryData','SubCategoriesController@getSubCategoryData');
Route::get('/t','SubCategoriesController@getSubCategoryData');
Route::post('/deleteSubCategoryData','SubCategoriesController@deleteSubCategoryData');
Route::post('/getSubCategoryDetails','SubCategoriesController@getSubCategoryDetails');
Route::post('/updateSubCategoryDetails','SubCategoriesController@updateSubCategoryDetails');
Route::post('/insertSubCategory','SubCategoriesController@insertSubCategory');


Route::get('/ProductsIndex','ProductController@ProductsIndex');
Route::get('/getProductsData','ProductController@getProductsData');
Route::post('/deleteProductsData','ProductController@deleteProductsData');
Route::post('/getProductsDetails','ProductController@getProductsDetails');
Route::post('/updateProductsDetails','ProductController@updateProductsDetails');
Route::post('/insertProducts','ProductController@insertProducts');


