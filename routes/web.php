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

Route::group(['namespace'=>'Admin'],function(){

    Route::get('login',['as'=>'login','uses'=>'LoginController@login']);
    Route::post('do-login',['as'=>'do.login','uses'=>'LoginController@doLogin']);
    Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);

    Route::group(['middleware'=>'AdminCheck'],function(){
        Route::get('demo',['as'=>'demo','uses'=>'AdminController@demo'] );
        Route::get('dashboard',['as'=>'dashboard','uses'=>'AdminController@dashboard'] );
        Route::get('category',['as'=>'category','uses'=>'AdminController@category'] );
        Route::get('category-create',['as'=>'category.create','uses'=>'AdminController@categoryCreate'] );
        Route::get('category-edit',['as'=>'category.edit','uses'=>'AdminController@categoryEdit'] );
        Route::get('banner',['as'=>'banner','uses'=>'AdminController@banner'] );
        Route::get('banner-edit',['as'=>'banner.edit','uses'=>'AdminController@bannerEdit'] );
        Route::get('product',['as'=>'product','uses'=>'AdminController@product'] );
        Route::get('product-edit',['as'=>'product.edit','uses'=>'AdminController@productEdit'] );
        Route::get('customer',['as'=>'customer','uses'=>'AdminController@customer'] );
        Route::get('wishlist',['as'=>'wishlist','uses'=>'AdminController@wishlist'] );
        Route::get('customer-order',['as'=>'customer.order','uses'=>'AdminController@customerOrder'] );
        Route::get('order',['as'=>'order','uses'=>'AdminController@order'] );
        Route::get('order-product',['as'=>'order.product','uses'=>'AdminController@orderProduct'] );
        Route::get('menu',['as'=>'menu','uses'=>'AdminController@menu'] );
        Route::get('coupon',['as'=>'coupon','uses'=>'AdminController@coupon'] );
    }); 

});
