<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
//Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::post('add_sales', 'HomeController@add_sales');
Route::post('del_products', 'HomeController@del_products');
Route::post('add_products', 'HomeController@add_products');
Route::get('del_products', 'HomeController@del_products');
Route::post('add_distributor', 'HomeController@add_distributor');
Route::post('add_customer', 'HomeController@add_customer');
Route::post('search_user', 'HomeController@search_user');
Route::post('search_product', 'HomeController@search_product');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
