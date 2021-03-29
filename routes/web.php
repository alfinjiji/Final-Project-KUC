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
        Route::get('banner',['as'=>'banner','uses'=>'BannerController@banner'] );
        Route::get('banner-edit/{id}',['as'=>'banner.edit','uses'=>'BannerController@bannerEdit'] );
        Route::post('banner-uplaod',['as'=>'banner.upload','uses'=>'BannerController@BannerUpload']);
        Route::post('do-banner-edit/{id}',['as'=>'do.banner.edit','uses'=>'BannerController@DobannerEdit']);
        Route::get('banner-delete/{id}',['as'=>'banner.delete','uses'=>'BannerController@bannerdelete'] );
        //product
        Route::get('product',['as'=>'product','uses'=>'AdminController@product'] );
        Route::get('product-edit',['as'=>'product.edit','uses'=>'AdminController@productEdit'] );
        //customer
        Route::get('customer',['as'=>'customer','uses'=>'CustomerController@customer'] );
        Route::get('customer-address/{id}',['as'=>'customer.address','uses'=>'CustomerController@customerAddress'] );
        Route::get('customer-order/{id}',['as'=>'customer.order','uses'=>'CustomerController@customerOrder'] );
        //wishlist
        Route::get('wishlist/{id}',['as'=>'wishlist','uses'=>'CustomerController@wishlist'] );
       //order
        Route::get('order',['as'=>'order','uses'=>'AdminController@order'] );
        Route::get('order-product',['as'=>'order.product','uses'=>'AdminController@orderProduct'] );
        //menu
        Route::get('menu',['as'=>'menu','uses'=>'AdminController@menu'] );
        Route::get('menu-create',['as'=>'menu.create','uses'=>'AdminController@menuCreate'] );
        Route::get('menu-edit',['as'=>'menu.edit','uses'=>'AdminController@menuEdit'] );
        //cupon
        Route::get('coupon',['as'=>'coupon','uses'=>'CouponController@coupon'] );
        Route::post('coupon-add',['as'=>'coupon.add','uses'=>'CouponController@couponAdd'] );
        Route::get('coupon-delete/{id}',['as'=>'coupon.delete','uses'=>'CouponController@coupondelete'] );
    }); 

});
