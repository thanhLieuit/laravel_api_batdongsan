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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('auth/register', 'Api\LoginController@register');
Route::post('auth/login', 'Api\LoginController@login');
Route::group(['middleware' => 'auth.jwt'], function () {
 	Route::get('auth', 'Api\LoginController@user');
 	Route::get('logout', 'Api\LoginController@logout');
 	Route::post('support/add', 'Api\SupportController@add');
 	Route::get('support', 'Api\SupportController@view');
 	
	Route::post('product/add', 'Api\ProductController@add');
	Route::post('product/{id}', 'Api\ProductController@edit');
	Route::delete('product/{product}', 'Api\ProductController@delete');

});

Route::apiResource('danhmuc', 'Api\IndexController')->only(['index', 'show']);
	Route::get('product/{id}', 'Api\ProductController@view');
	route::post('search', 'Api\ProductController@search');
	Route::post('sort', 'Api\ProductController@sort');

