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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('v1.admin-views.pages.test-only.test1');

});

Route::get('/test2', function () {
    return view('v1.admin-views.pages.test-only.test2');

});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' ], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::prefix('admin')->group(function () {
    //Category
    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\v1\CategoryController@index']);
        Route::get('/create',[
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\v1\CategoryController@create']);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\v1\CategoryController@store']);
        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\v1\CategoryController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\v1\CategoryController@delete']);
        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\v1\CategoryController@update']);
    });
     //Product-Companies
     Route::prefix('product-companies')->group(function () {
        Route::get('/',[
            'as' => 'product-companies.index',
            'uses' => 'App\Http\Controllers\v1\ProductCompanyController@index']);
        Route::get('/create',[
            'as' => 'product-companies.create',
            'uses' => 'App\Http\Controllers\v1\ProductCompanyController@create']);
        Route::post('/store',[
            'as' => 'product-companies.store',
            'uses' => 'App\Http\Controllers\v1\ProductCompanyController@store']);
        Route::get('/edit/{id}',[
            'as' => 'product-companies.edit',
            'uses' => 'App\Http\Controllers\v1\ProductCompanyController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'product-companies.delete',
            'uses' => 'App\Http\Controllers\v1\ProductCompanyController@delete']);
        Route::post('/update/{id}',[
            'as' => 'product-companies.update',
            'uses' => 'App\Http\Controllers\v1\ProductCompanyController@update']);
    });
     //Products
     Route::prefix('products')->group(function () {
        Route::get('/',[
            'as' => 'products.index',
            'uses' => 'App\Http\Controllers\v1\ProductController@index']);
        Route::get('/create',[
            'as' => 'products.create',
            'uses' => 'App\Http\Controllers\v1\ProductController@create']);
        Route::post('/store',[
            'as' => 'products.store',
            'uses' => 'App\Http\Controllers\v1\ProductController@store']);
        Route::get('/edit/{id}',[
            'as' => 'products.edit',
            'uses' => 'App\Http\Controllers\v1\ProductController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'products.delete',
            'uses' => 'App\Http\Controllers\v1\ProductController@delete']);
        Route::post('/update/{id}',[
            'as' => 'products.update',
            'uses' => 'App\Http\Controllers\v1\ProductController@update']);
    });
});