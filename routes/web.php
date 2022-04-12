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
Route::match(['get', 'post'], '/signup','UserController@signup')->name('signup');
Route::match(['get', 'post'], '/signin','UserController@signin')->name('signin');
Route::get('/contactus', 'IndexController@contactus');
Auth::routes();
Route::middleware(['user'])->group(function () {
	Route::get('/profile', 'IndexController@profile')->name('profile');
	Route::post('/updateprofile', 'UserController@updateprofile')->name('updateprofile');
	Route::post('/update-kyc', 'UserController@updatekyc')->name('updatekyc');
	Route::post('/updatepassword', 'UserController@updatepassword')->name('updatepassword');
	Route::get('/logout', 'UserController@logout');	
});
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function(){
	Route::get('/', 'AdminController@index')->name('admin')->middleware('admin');
	Route::get('/clientlist', 'ClientController@clientlist')->name('admin')->middleware('admin');
	Route::match(['get', 'post'], '/addclient','ClientController@addclient')->name('addclient')->middleware('admin');
	Route::get('/editclient/{id}', 'ClientController@editclient')->name('admin')->middleware('admin');
	Route::get('/deleteclient/{id}', 'ClientController@deleteclient')->name('admin')->middleware('admin');
	Route::get('/user', 'UserController@index')->name('admin')->middleware('admin');
	Route::get('/coupon', 'CouponController@index')->name('admin')->middleware('admin');
	Route::match(['get', 'post'], '/addcoupon','CouponController@addcoupon')->name('addcoupon')->middleware('admin');
	
	Route::get('/list-testimonials', 'PageController@listtestimonials');
	Route::get('/add-testimonials', 'PageController@addtestimonials');
	Route::post('/save-testimonials', 'PageController@savetestimonials');
	Route::get('/edit-testimonials/{id}', 'PageController@edittestimonials');
	Route::get('/delete-testimonials/{id}', 'PageController@deletetestimonials');

	Route::get('/list-faqs', 'PageController@listfaqs');
	Route::get('/add-faqs', 'PageController@addfaqs');
	Route::post('/save-faqs', 'PageController@savefaqs');
	Route::get('/edit-faqs/{id}', 'PageController@editfaqs');
	Route::get('/delete-faqs/{id}', 'PageController@deletefaqs');


	Route::get('/list-categorys', 'PageController@listcategorys');
	Route::get('/add-categorys', 'PageController@addcategorys');
	Route::post('/save-categorys', 'PageController@savecategorys');
	Route::get('/edit-categorys/{id}', 'PageController@editcategorys');
	Route::get('/delete-categorys/{id}', 'PageController@deletecategorys');


	Route::get('/list-subcategorys', 'PageController@listsubcategorys');
	Route::get('/add-subcategorys', 'PageController@addsubcategorys');
	Route::post('/save-subcategorys', 'PageController@savesubcategorys');
	Route::get('/edit-subcategorys/{id}', 'PageController@editsubcategorys');
	Route::get('/delete-subcategorys/{id}', 'PageController@deletesubcategorys');


	Route::get('/list-cities', 'PageController@listcities');
	Route::get('/add-cities', 'PageController@addcities');
	Route::post('/save-cities', 'PageController@savecities');
	Route::get('/edit-cities/{id}', 'PageController@editcities');
	Route::get('/delete-cities/{id}', 'PageController@deletecities');


	Route::get('/list-banners', 'PageController@listbanners');
	Route::get('/add-banners', 'PageController@addbanners');
	Route::post('/save-banners', 'PageController@savebanners');
	Route::get('/edit-banners/{id}', 'PageController@editbanners');
	Route::get('/delete-banners/{id}', 'PageController@deletebanners');
	
    Route::get('/list-cms', 'PageController@listcms');
	Route::get('/add-cms', 'PageController@addcms');
	Route::post('/save-cms', 'PageController@savecms');
	Route::get('/edit-cms/{id}', 'PageController@editcms');
	Route::get('/delete-cms/{id}', 'PageController@deletecms');
	
	Route::get('/list-contactus', 'PageController@listcontactus');
	Route::post('/save-contactus', 'PageController@savecontactus');
	Route::get('/delete-contactus/{id}', 'PageController@deletecontactus');	
	
	Route::get('/list-kycinformations', 'PageController@listkycinformations');
	Route::post('/save-kycinformations', 'PageController@savekycinformations');
	Route::get('/delete-kycinformations/{id}', 'PageController@deletekycinformations');
	Route::get('/logout', 'HomeController@logout');	
	Route::get('/home', 'HomeController@index');
	Route::get('/myprofile', 'AdminController@myprofile');
	Route::post('/updateprofile', 'AdminController@updateprofile');
	
});
