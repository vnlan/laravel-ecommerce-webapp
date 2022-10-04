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
});