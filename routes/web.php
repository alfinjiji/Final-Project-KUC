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
        //Route::get('demo',['as'=>'demo','uses'=>'AdminController@demo'] );
        Route::get('dashboard',['as'=>'dashboard','uses'=>'AdminController@dashboard'] );
        //category
        Route::get('category',['as'=>'category','uses'=>'CategoryController@CategoryView'] );
        Route::get('category-create',['as'=>'category.create','uses'=>'CategoryController@CategoryCreate'] );
        Route::get('category-edit/{id}',['as'=>'category.edit','uses'=>'CategoryController@categoryEdit'] );
        Route::post('category-add',['as'=>'category.add','uses'=>'CategoryController@CategoryAdd'] );
        Route::post('category-update/{id}',['as'=>'category.update','uses'=>'CategoryController@CategoryUpdate'] );
        Route::get('category-delete/{id}',['as'=>'category.delete','uses'=>'CategoryController@CategoryDelete'] );
        //banner
        Route::get('banner',['as'=>'banner','uses'=>'AdminController@banner'] );
        Route::get('banner-edit',['as'=>'banner.edit','uses'=>'AdminController@bannerEdit'] );
        //product
        Route::get('product',['as'=>'product','uses'=>'AdminController@product'] );
        Route::get('product-edit',['as'=>'product.edit','uses'=>'AdminController@productEdit'] );
        //customer
        Route::get('customer',['as'=>'customer','uses'=>'AdminController@customer'] );
        Route::get('customer-address',['as'=>'customer.address','uses'=>'AdminController@customerAddress'] );
        Route::get('customer-order',['as'=>'customer.order','uses'=>'AdminController@customerOrder'] );
        //wishlist
        Route::get('wishlist',['as'=>'wishlist','uses'=>'AdminController@wishlist'] );
       //order
        Route::get('order',['as'=>'order','uses'=>'AdminController@order'] );
        Route::get('order-product',['as'=>'order.product','uses'=>'AdminController@orderProduct'] );
        //menu
        Route::get('menu',['as'=>'menu','uses'=>'MenuController@menu'] );
        Route::get('menu-create',['as'=>'menu.create','uses'=>'MenuController@menuCreate'] );
        Route::post('do-menu-create',['as'=>'do.menu.create','uses'=>'MenuController@doMenuCreate'] );
        Route::get('menu-edit/{id}',['as'=>'menu.edit','uses'=>'MenuController@menuEdit'] );
        Route::post('do-menu-edit/{id}',['as'=>'do.menu.edit','uses'=>'MenuController@doMenuEdit'] );
        Route::get('menu-delete/{id}',['as'=>'menu.delete','uses'=>'MenuController@menuDelete'] );
        //cupon
        Route::get('coupon',['as'=>'coupon','uses'=>'AdminController@coupon'] );
    }); 

});
