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

Route::get('/', 'HomeController@home');

// Auth routes
Route::group(['namespace' => 'Auth', 'as' => 'auth::'], function() {
	
	Route::get('/login', ['uses' => 'AuthController@getLogin', 'as' => 'login']);
	Route::post('/login', ['uses' => 'AuthController@postLogin']);
	Route::get('/register', ['uses' => 'AuthController@getRegister', 'as' => 'register']);
	Route::post('/register', ['uses' => 'AuthController@postRegister']);
	Route::get('/logout', ['uses' => 'AuthController@getLogout', 'as' => 'logout']);
	Route::get('/forgot', ['uses' => 'AuthController@forgotPage', 'as' => 'forgot']);
	
});

//Auth::routes();

// Admin routes
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin::'], function() {
	
	Route::get('/dashboard', ['uses' => 'AdminController@dashboard', 'as' => 'dashboard']);
	
	Route::group(['namespace' => 'Catalog', 'prefix' => 'catalog'], function() {
		
		Route::resource('products', 'ProductsController');
		
	});
	
});

Route::get('/home', 'HomeController@index');
