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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    route::group(['prefix'=>'category'], function() {
        route::get('/' ,'AdminCategoryController@index')->name('admin.get.list.category');
        route::get('/create' ,'AdminCategoryController@create')->name('admin.get.create.category');
        route::post('/create' ,'AdminCategoryController@store');
        route::get('/update/{id}' ,'AdminCategoryController@edit')->name('admin.get.edit.category');
        route::post('/update/{id}' ,'AdminCategoryController@update');
        route::get('/{action}/{id}' ,'AdminCategoryController@action')->name('admin.get.action.category');

    }
);

route::group(['prefix'=>'product'], function() {
    route::get('/' ,'AdminProductController@index')->name('admin.get.list.product');
    route::get('/create' ,'AdminProductController@create')->name('admin.get.create.product');
    route::post('/create' ,'AdminProductController@store');
    route::get('/update/{id}' ,'AdminProductController@edit')->name('admin.get.edit.product');
    route::post('/update/{id}' ,'AdminProductController@update');
    route::get('/{action}/{id}' ,'AdminProductController@action')->name('admin.get.action.product');

}
);

route::group(['prefix'=>'article'], function() {
    route::get('/' ,'AdminArticleController@index')->name('admin.get.list.article');
    route::get('/create' ,'AdminArticleController@create')->name('admin.get.create.article');
    route::post('/create' ,'AdminArticleController@store');
    route::get('/update/{id}' ,'AdminArticleController@edit')->name('admin.get.edit.article');
    route::post('/update/{id}' ,'AdminArticleController@update');
    route::get('/{action}/{id}' ,'AdminArticleController@action')->name('admin.get.action.article');

}
);
//quan li don hang
route::group(['prefix'=>'transaction'], function() {
    route::get('/' ,'AdminTransactionController@index')->name('admin.get.list.transaction');


}
);
//quan li thanh vien
route::group(['prefix'=>'user'], function() {
    route::get('/' ,'AdminUserController@index')->name('admin.get.list.user');
    route::get('/create' ,'AdminUserController@create')->name('admin.get.create.user');
    route::post('/create' ,'AdminUserController@store');

    route::get('/update/{id}' ,'AdminUserController@edit')->name('admin.get.edit.user');
    route::post('/update/{id}' ,'AdminUserController@update');
    route::get('/{action}/{id}' ,'AdminUserController@action')->name('admin.get.action.user');
}
);





});

