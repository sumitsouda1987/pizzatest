<?php

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

Route::group(['prefix' => 'admin',  'middleware' => 'auth:admin'], function() {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    //Category Controller
	Route::get('/category','CategoryController@index')->name('admin.category');
   	Route::get('/category/create', 'CategoryController@create')->name('admin.category.create');
   	Route::post('/category', 'CategoryController@store')->name('admin.category.store');
   	Route::get('/category/edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
   	Route::patch('/category/{category}', 'CategoryController@update')->name('admin.category.update');
   	Route::delete('/category/{category}','CategoryController@destroy')->name('admin.category.delete');

	//Product Controller
   	Route::get('/product','ProductController@index')->name('admin.product');
   	Route::get('/product/create', 'ProductController@create')->name('admin.product.create');
   	Route::post('/product', 'ProductController@store')->name('admin.product.store');
   	Route::get('/product/edit/{product}', 'ProductController@edit')->name('admin.product.edit');
   	Route::patch('/product/{product}', 'ProductController@update')->name('admin.product.update');
   	Route::delete('/product/{product}','ProductController@destroy')->name('admin.product.delete');
});