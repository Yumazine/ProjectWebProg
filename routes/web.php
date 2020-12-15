<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@getDefaultView');
Route::post('/', 'HomeController@getSearchView');

Route::get('/Login', 'AuthController@getLoginPage');
Route::post('/Login', 'AuthController@authenticate');

Route::get('/Logout', 'AuthController@logout');

Route::get('/Register', 'AuthController@getRegisterPage');
Route::post('/Register', 'AuthController@registerUser');

Route::get('/Carts', 'CartController@getCarts');
Route::post('/Carts', 'CartController@checkouts');

Route::get('/Carts/{id}', 'CartController@getEditCart');
Route::post('/Carts/{id}', 'CartController@editCart');

Route::get('/Shoe/{id}', 'CartController@getShoePage');
Route::post('/Shoe/{id}', 'CartController@addToCart');

Route::get('/Edit/{id}', 'ShoeController@editShoe');
Route::post('/Edit/{id}', 'ShoeController@updateShoe');

Route::get('/AddShoe', 'ShoeController@addShoe');
Route::post('/AddShoe', 'ShoeController@insertShoe');

Route::get('/Transactions', 'TransactionController@getHistory');
Route::get('/AllTransactions', 'TransactionController@getAllTransactions');