<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/api', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', 'UserController@login')->middleware(['api-check', 'throttle'])->name('customer.login');
Route::post('/register', 'UserController@register')->middleware(['api-check', 'throttle'])->name('customer.register');
Route::post('/add_address', 'CustomerAddressController@store')->middleware(['api-check', 'throttle'])->name('customer.addaddress');
Route::get('/addresses', 'CustomerAddressController@getUserAddresses')->middleware(['api-check', 'throttle'])->name('customer.address');
Route::post('/place_order', 'OrderController@saveOrder')->middleware(['api-check', 'throttle'])->name('order.place');


Route::get('/categories', 'CategoryController@all')->name('categories.all');
Route::get('/products', 'ProductController@all')->name('products.all');
Route::get('/category/{name}', 'CategoryController@getProductsByCategoryName')->name('category.byname');