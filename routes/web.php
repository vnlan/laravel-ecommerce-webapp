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
    return view('v1.shop-views.home');
});
Route::get('/admin', function () {
    return redirect()->route('admin.auth.login');
});


Route::get('/test', function () {
    return view('v1.admin-views.pages.test-only.test1');

});

Route::get('/test2', function () {
    return view('v1.admin-views.pages.test-only.test2');

});



//Route for shop front

Route::prefix('/')->group(function () {
    //Product
    Route::prefix('products')->group(function () {
        Route::get('/',[
            'as' => 'shop.products.all',
            'uses' => 'App\Http\Controllers\v1\Shop\ShopProductController@index']);
        Route::get('/detail/{id}',[
            'as' => 'shop.products.detail',
            'uses' => 'App\Http\Controllers\v1\Shop\ShopProductController@detail']);
    //filter by category
    Route::get('/filter-by-category/{id}',[
        'as' => 'shop.products.filter-by-category',
        'uses' => 'App\Http\Controllers\v1\Shop\ShopProductController@filterByCategory']);
    //filter by category
    Route::get('/filter-by-brand/{id}',[
        'as' => 'shop.products.filter-by-brand',
        'uses' => 'App\Http\Controllers\v1\Shop\ShopProductController@filterByBrand']);
    //filter by multiple
        Route::post('/filter-by-multiple',[
            'as' => 'shop.products.filter-by-multiple',
            'uses' => 'App\Http\Controllers\v1\Shop\ShopProductController@filterByMultiple']);
    
        //search by name
            Route::get('/search-name',[
                'as' => 'shop.products.search-name',
                'uses' => 'App\Http\Controllers\v1\Shop\ShopProductController@searchByName']);
        });
    Route::prefix('cart')->group(function () {
        Route::get('/',[
            'as' => 'shop.cart.index',
            'uses' => 'App\Http\Controllers\v1\Shop\CartController@index']);
        Route::get('/addOne/{id}',[
            'as' => 'shop.cart.addOne',
            'uses' => 'App\Http\Controllers\v1\Shop\CartController@addOne']);
        Route::get('/buyNow/{id}',[
            'as' => 'shop.cart.buyNow',
            'uses' => 'App\Http\Controllers\v1\Shop\CartController@buyNow']);
        Route::get('/delete/{rowId}',[
            'as' => 'shop.cart.delete',
            'uses' => 'App\Http\Controllers\v1\Shop\CartController@delete']);
        Route::get('/update',[
            'as' => 'shop.cart.update',
            'uses' => 'App\Http\Controllers\v1\Shop\CartController@update']);
    });
    Route::prefix('blogs')->group(function () {
        Route::get('/',[
            'as' => 'shop.blogs.index',
            'uses' => 'App\Http\Controllers\v1\Shop\BlogController@index']);
        Route::get('/detail/{id}',[
            'as' => 'shop.blogs.detail',
            'uses' => 'App\Http\Controllers\v1\Shop\BlogController@detail']);
     
    });
    Route::prefix('checkout')->middleware('shop.auth')->group(function () {
        Route::get('/',[
            'as' => 'shop.checkout.index',
            'uses' => 'App\Http\Controllers\v1\Shop\OrderController@index']);
        Route::post('/add-order',[
            'as' => 'shop.checkout.add-order',
            'uses' => 'App\Http\Controllers\v1\Shop\OrderController@store']);
    });

    Route::prefix('my-info')->middleware('shop.auth')->group(function () {
        Route::get('/',[
            'as' => 'shop.my-info.index',
            'uses' => 'App\Http\Controllers\v1\Shop\MyInfoController@index']);
        Route::post('/update-info/{id}',[
            'as' => 'shop.my-info.update-info',
            'uses' => 'App\Http\Controllers\v1\Shop\MyInfoController@updateInfo']);
        Route::post('/update-order/{id}',[
            'as' => 'shop.my-info.update-order',
            'uses' => 'App\Http\Controllers\v1\Shop\MyInfoController@updateOrder']);
    });

    //Home page
    Route::get('/', [ 'as' => 'shop.index', 'uses' => 'App\Http\Controllers\v1\Shop\HomePageController@index']);

    //login
    Route::post('/login', [ 'as' => 'shop.auth.login', 'uses' => 'App\Http\Controllers\v1\AuthController@shopLogin']);
     // Đăng xuất
     Route::get('/logout', [ 'as' => 'shop.auth.logout', 'uses' => 'App\Http\Controllers\v1\AuthController@shopLogout']);
     Route::post('/register', [ 'as' => 'shop.auth.register', 'uses' => 'App\Http\Controllers\v1\AuthController@shopRegister']);
});



Route::group(['prefix' => 'laravel-filemanager', 'middleware' ], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::prefix('admin')->group(function () {


    Route::get('/login', [ 'as' => 'admin.auth.index', 'uses' => 'App\Http\Controllers\v1\AuthController@index']);
    Route::post('/login', [ 'as' => 'admin.auth.login', 'uses' => 'App\Http\Controllers\v1\AuthController@login']);
   
    Route::get('/welcome', [ 'as' => 'admin.welcome', 'uses' => 'App\Http\Controllers\v1\AuthController@welcome'])->middleware('admin.auth:4');
    // Đăng xuất
    Route::get('/logout', [ 'as' => 'admin.auth.logout', 'uses' => 'App\Http\Controllers\v1\AuthController@logout']);

    
    //My infomation
    Route::get('/my-info', [ 'as' => 'admin.myinfo', 'uses' => 'App\Http\Controllers\v1\UserController@myInfo'])->middleware('admin.auth:4');

    //Category
    Route::prefix('categories')->middleware('admin.auth:1')->group(function () {
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
     Route::prefix('product-companies')->middleware('admin.auth:1')->group(function () {
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
     Route::prefix('products')->middleware('admin.auth:1')->group(function () {
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

    //Employees
    Route::prefix('employees')->middleware('admin.auth:1')->group(function () {
        Route::get('/',[
            'as' => 'employees.index',
            'uses' => 'App\Http\Controllers\v1\UserController@empIndex']);
        Route::get('/create',[
            'as' => 'employees.create',
            'uses' => 'App\Http\Controllers\v1\UserController@empCreate']);
        Route::post('/store',[
            'as' => 'employees.store',
            'uses' => 'App\Http\Controllers\v1\UserController@empStore']);
        Route::get('/edit/{id}',[
            'as' => 'employees.edit',
            'uses' => 'App\Http\Controllers\v1\UserController@empEdit']);
        Route::get('/delete/{id}',[
            'as' => 'employees.delete',
            'uses' => 'App\Http\Controllers\v1\UserController@empDelete']);
        Route::post('/update/{id}',[
            'as' => 'employees.update',
            'uses' => 'App\Http\Controllers\v1\UserController@empUpdate']);
    });
    Route::prefix('customers')->middleware('admin.auth:1')->group(function () {
        Route::get('/',[
            'as' => 'customers.index',
            'uses' => 'App\Http\Controllers\v1\UserController@customerIndex']);
        Route::get('/create',[
            'as' => 'customers.create',
            'uses' => 'App\Http\Controllers\v1\UserController@customerCreate']);
        Route::post('/store',[
            'as' => 'customers.store',
            'uses' => 'App\Http\Controllers\v1\UserController@customerStore']);
        Route::get('/edit/{id}',[
            'as' => 'customers.edit',
            'uses' => 'App\Http\Controllers\v1\UserController@customerEdit']);
        Route::get('/delete/{id}',[
            'as' => 'customers.delete',
            'uses' => 'App\Http\Controllers\v1\UserController@customerDelete']);
        Route::post('/update/{id}',[
            'as' => 'customers.update',
            'uses' => 'App\Http\Controllers\v1\UserController@customerUpdate']);
    });

    Route::prefix('orders')->middleware('admin.auth:2')->group(function () {
        Route::get('/',[
            'as' => 'orders.index',
            'uses' => 'App\Http\Controllers\v1\OrderController@index']);
      
        Route::get('/edit/{id}',[
            'as' => 'orders.edit',
            'uses' => 'App\Http\Controllers\v1\OrderController@edit']);
      
        Route::post('/update/{id}',[
            'as' => 'orders.update',
            'uses' => 'App\Http\Controllers\v1\OrderController@update']);
        Route::get('/deny/{id}',[
            'as' => 'orders.deny',
            'uses' => 'App\Http\Controllers\v1\OrderController@deny']);
    });

    Route::prefix('analize')->middleware('admin.auth:1')->group(function () {
        Route::get('/',[
            'as' => 'analize.index',
            'uses' => 'App\Http\Controllers\v1\AnalizeController@index']);
    });

     //Sliders
     Route::prefix('sliders')->middleware('admin.auth:4')->group(function () {
        Route::get('/',[
            'as' => 'sliders.index',
            'uses' => 'App\Http\Controllers\v1\SliderController@index']);
        Route::get('/create',[
            'as' => 'sliders.create',
            'uses' => 'App\Http\Controllers\v1\SliderController@create']);
        Route::post('/store',[
            'as' => 'sliders.store',
            'uses' => 'App\Http\Controllers\v1\SliderController@store']);
        Route::get('/edit/{id}',[
            'as' => 'sliders.edit',
            'uses' => 'App\Http\Controllers\v1\SliderController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'sliders.delete',
            'uses' => 'App\Http\Controllers\v1\SliderController@delete']);
        Route::post('/update/{id}',[
            'as' => 'sliders.update',
            'uses' => 'App\Http\Controllers\v1\SliderController@update']);
    });
    Route::prefix('blogs')->middleware('admin.auth:4')->group(function () {
        Route::get('/',[
            'as' => 'blogs.index',
            'uses' => 'App\Http\Controllers\v1\BlogController@index']);
        Route::get('/create',[
            'as' => 'blogs.create',
            'uses' => 'App\Http\Controllers\v1\BlogController@create']);
        Route::post('/store',[
            'as' => 'blogs.store',
            'uses' => 'App\Http\Controllers\v1\BlogController@store']);
        Route::get('/edit/{id}',[
            'as' => 'blogs.edit',
            'uses' => 'App\Http\Controllers\v1\BlogController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'blogs.delete',
            'uses' => 'App\Http\Controllers\v1\BlogController@delete']);
        Route::post('/update/{id}',[
            'as' => 'blogs.update',
            'uses' => 'App\Http\Controllers\v1\BlogController@update']);
    });
});