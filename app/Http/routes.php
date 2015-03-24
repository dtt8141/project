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
//delete
Route::post('del_products', 'HomeController@del_products');
Route::get('del_products', 'HomeController@del_products');
Route::post('del_users', 'HomeController@del_users');
Route::get('del_users', 'HomeController@del_users');
Route::get('del_customers', 'HomeController@del_customers');
Route::get('del_distributors', 'HomeController@del_distributors');

//edit
Route::get('edit_products', 'HomeController@edit_products');
Route::get('edit_users', 'HomeController@edit_users');
Route::get('edit_customers', 'HomeController@edit_customers');
Route::get('edit_distributors', 'HomeController@edit_distributors');
//add
Route::post('add_products', 'HomeController@add_products');
Route::post('add_sales', 'HomeController@add_sales');
Route::post('add_distributor', 'HomeController@add_distributor');
Route::post('add_customer', 'HomeController@add_customer');
//searh
Route::post('search_user', 'HomeController@search_user');
Route::post('search_product', 'HomeController@search_product');
Route::post('search_distributor', 'HomeController@search_distributor');
Route::post('search_customer', 'HomeController@search_customer');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
