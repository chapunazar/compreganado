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

//--- Web
Route::get('/','ListingsController@home')->name('home');
Route::get('/listings/{listing}','ListingsController@webshow');
Route::post('/listings/{listing}/comments','CommentsController@store');


//--- show all listings filtered by breed
Route::get('/listings/breeds/{breed}','BreedsController@webshow');

//--- show all listings filtered by category
Route::get('/listings/categories/{category}','CategoriesController@webshow');

//--- show all listings filtered by payment methods
Route::get('/listings/paymentmethods/{paymentmethod}','PaymentmethodsController@webshow');

//Display images and files
Route::get('/files/{filename}','ListingFilesController@showFile');

// START OF AUTH RESTRICTED ACCESS
Route::group(['middleware' => 'auth'], function()
{
	//user must be logged in ordet to place an offer
	Route::post('/listings/{listing}/offers','OffersController@store');

	// Console
	Route::group(['_active_menu'=>'dashboard'], function()
	{
		Route::get('/console','DashboardController@index');
	});

	Route::group(['_active_menu'=>'listings'], function()
	{
		Route::get('/console/listings','ListingsController@index');
		Route::get('/console/listings/create','ListingsController@create');
		Route::post('/console/listings','ListingsController@store');
		Route::get('/console/listings/{listing}','ListingsController@show');
		Route::post('/console/listings/{listing}/comments','CommentsController@store');
		Route::get('/console/listings/{listing}/expire','ListingsController@expire');
		Route::get('/console/listings/{listing}/enable','ListingsController@enable');
		Route::get('/console/listings/{listing}/activate','ListingsController@activate');
		Route::get('/console/listings/{listing}/deactivate','ListingsController@deactivate');
	});

	Route::group(['_active_menu'=>'comments'], function()
	{
		Route::get('/console/comments','CommentsController@index');

	});

		Route::group(['_active_menu'=>'offers'], function()
	{
		Route::get('/console/offers','OffersController@index');

	});


	Route::group(['_active_menu'=>'template'], function()
	{
		// View all template options
		Route::get('/console/template',function()
	    	{
    			return view('console.template');
		});
	});
	
});
// END OF AUTH RESTRICTED ACCESS

// START OF ADMIN RESTRICTED ACCESS
Route::group(['middleware' => 'admin'], function()
{
	/*
	Route::get('console/breeds','BreedsController@index');
	Route::get('console/breeds/create','BreedsController@create');
	Route::post('console/breeds','BreedsController@store');
	Route::get('console/breeds/{breed}','BreedsController@show');
	Route::get('console/breeds/{breed}/edit','BreedsController@edit');
	Route::patch('console/breeds/{breed}','BreedsController@update');
	*/
	Route::group(['_active_menu'=>'breeds'], function()
	{
		Route::resource('/console/breeds','BreedsController');
	});
	
	Route::group(['_active_menu'=>'categories'], function()
	{
		Route::resource('/console/categories','CategoriesController');
	});

	Route::group(['_active_menu'=>'listings'], function()
	{
		Route::get('/console/listings/breeds/{breed}','BreedsController@showlistings');
		Route::get('/console/listings/categories/{category}','CategoriesController@showlistings');
		Route::get('/console/listings/paymentmethods/{paymentmethod}','PaymentmethodsController@showlistings');
	});

	Route::group(['_active_menu'=>'paymentmethods'], function()
	{
		Route::get('/console/paymentmethods','PaymentmethodsController@index');
		Route::get('/console/paymentmethods/create','PaymentmethodsController@create');
		Route::post('/console/paymentmethods','PaymentmethodsController@store');
		Route::get('/console/paymentmethods/{paymentmethod}','PaymentmethodsController@show');
		Route::delete('/console/paymentmethods/{paymentmethod}','PaymentmethodsController@destroy');
	});

	Route::group(['_active_menu'=>'users'], function()
	{
		Route::get('/console/users','UsersController@index');
		Route::get('/console/users/{user}','UsersController@show');
		Route::get('/console/users/{user}/toggleadmin','UsersController@toggleAdmin');

	});

		
});

// Login and registration
Route::get('/login','SessionsController@create');
Route::get('/logout','SessionsController@destroy');
Route::post('/login','SessionsController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');



Route::get('/about', function () {
    return view('about');
});

