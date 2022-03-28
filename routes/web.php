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
Route::get('/', 'IndexController@index');	
Auth::routes();
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function(){
	Route::get('/', 'AdminController@index')->name('admin')->middleware('admin');;
	Route::get('/user', 'UserController@index')->name('admin')->middleware('admin');
	Route::get('/home', 'HomeController@index');
	Route::get('/logout', 'HomeController@logout');	
});
