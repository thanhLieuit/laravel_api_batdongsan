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


//Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('/dashboard');
Route::prefix('admin')->group(function() {
	Route::get('/login','Admin\LoginContrller@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\LoginContrller@login')->name('admin.login.submit');
	Route::get('logout/', 'Admin\LoginContrller@logout')->name('admin.logout');
});
Route::middleware(['auth:admin'])->group(function () {
	Route::prefix('admin')->group(function() {
	    
	    Route::get('/index', 'AdminController@index')->name('admin.dashboard');

	    route::get('/insert-error','Admin\SupportController@getinsert')->name('admin.insert-error');
	    route::post('/insert-error','Admin\SupportController@postinsert')->name('admin.insert-error');
	    route::get('/delete-error/{id}','Admin\SupportController@getdeleteerr')->name('admin.delete-error');

	    route::get('/support','Admin\SupportController@getsupport')->name('admin.support');
	    route::post('/support-processing/{id}','Admin\SupportController@postsupportprocessing')->name('admin.support-processing');
	    route::get('/support-done/{id}','Admin\SupportController@getsupportdone')->name('admin.support-done');

	    route::get('/product-utilitie','Admin\ProductController@getproductutilitie')->name('admin.product-utilitie');
	    route::post('/product-utilitie','Admin\ProductController@postproductutilitie')->name('admin.product-utilitie');
	    route::get('/product-off-utilitie/{id}','Admin\ProductController@getproductoffutilitie')->name('admin.product-off-utilitie');
	    route::get('/product-on-utilitie/{id}','Admin\ProductController@getproductonutilitie')->name('admin.product-on-utilitie');
	    route::get('/product-delete-utilitie/{id}','Admin\ProductController@getproductdeleteutilitie')->name('admin.product-delete-utilitie');

	    route::get('/product','Admin\ProductController@getproduct')->name('admin.product');
	    route::post('/product-add','Admin\ProductController@postproductadd')->name('admin.product-add');
	    route::get('/product-edit/{id}','Admin\ProductController@getproductedit')->name('admin.product-edit');
	    route::post('/product-edit/{id}','Admin\ProductController@postproductedit')->name('admin.product-edit');
	    route::get('/product-delete/{id}','Admin\ProductController@getproductdelete')->name('admin.product-delete');
	    route::get('/product-off/{id}','Admin\ProductController@getproductoff')->name('admin.product-off');
	    route::get('/product-on/{id}','Admin\ProductController@getproducton')->name('admin.product-on');

	    Route::get('/category', 'Admin\ProductController@getcategory')->name('admin.category');
	    Route::post('/category-add', 'Admin\ProductController@postcategoryadd')->name('admin.category-add');
 		Route::post('/category-edit/{id}', 'Admin\ProductController@postcategoryedit')->name('admin.category-edit');
 		Route::get('/category-delete/{id}', 'Admin\ProductController@getcategorydelete')->name('admin.category-delete');

 		Route::get('/type-prodcut', 'Admin\ProductController@gettypeproduct')->name('admin.type-prodcut');
 		route::post('/type-product-add','Admin\ProductController@posttypeproductadd')->name('admin.type-product-add');
 		Route::post('/type-product-edit/{id}', 'Admin\ProductController@posttypeproductedit')->name('admin.type-product-edit');
 		Route::get('/type-product-delete/{id}', 'Admin\ProductController@gettypeproductdelete')->name('admin.type-product-delete');
	}) ;
}) ;