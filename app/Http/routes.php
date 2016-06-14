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

Route::get('/', function () {
	$products = \marketplaceniaja\Product::with('type')->orderBy('id', 'desc')->get();
	$types = \marketplaceniaja\Type::with('products')->orderBy('id', 'desc')->get();
    return view('welcome')->with('products',$products)->with('types',$types);
});


Route::get('/products', 'ProductController@getIndex');
Route::get('/products/show/{name?}', 'ProductController@getShow');
Route::get('/products/create', 'ProductController@getCreate');
Route::post('/products/create', 'ProductController@postCreate');
Route::get('/products/edit/{id?}', 'ProductController@getEdit');
Route::post('/products/edit/', 'ProductController@postEdit');
Route::get('/products/delete/{title?}', 'ProductController@getDelete');
Route::get('/states', 'StateController@getIndex');
Route::get('/states/show/{id?}', 'StateController@getShow');

	#--------------------------------------
	# Authentication
	#--------------------------------------

	Route::get('/login', 'Auth\AuthController@getLogin');
	Route::post('/login', 'Auth\AuthController@postLogin');

	Route::get('/register', 'Auth\AuthController@getRegister');
	Route::post('/register', 'Auth\AuthController@postRegister');

	Route::get('/logout', 'Auth\AuthController@logout');
	


