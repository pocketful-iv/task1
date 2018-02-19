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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'list'], function () {
    Route::get('/', 'OrdersController@index');
    Route::match(['get', 'post'], 'create', 'OrdersController@create');
    Route::get('details/{id?}', 'OrdersController@details');
});