<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\CustomerController;
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

// Admin Routes
Route::group(['namespace'=>'Admin'],function(){

    Route::get('login',['as'=>'login','uses'=>'LoginController@login']);
    Route::post('do-login',['as'=>'do.login','uses'=>'LoginController@doLogin']);
    Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);

    Route::group(['middleware'=>'AdminCheck'],function(){
        //Route::get('demo',['as'=>'demo','uses'=>'AdminController@demo'] );
        Route::get('dashboard',['as'=>'dashboard','uses'=>'AdminController@index'] );
        //Category
        Route::get('category-show',['as'=>'category.show','uses'=>'CategoryController@show'] );
        Route::get('category-create',['as'=>'category.create','uses'=>'CategoryController@create'] );
        Route::get('category-edit/{id}',['as'=>'category.edit','uses'=>'CategoryController@edit'] );
        Route::post('category-store',['as'=>'category.store','uses'=>'CategoryController@store'] );
        Route::post('category-update/{id}',['as'=>'category.update','uses'=>'CategoryController@update'] );
        Route::get('category-destroy/{id}',['as'=>'category.destroy','uses'=>'CategoryController@destroy'] );
       //Banner
        Route::get('banner-show',['as'=>'banner.view','uses'=>'BannerController@show'] );
        Route::get('banner-edit/{id}',['as'=>'banner.edit','uses'=>'BannerController@edit'] );
        Route::post('banner-store',['as'=>'banner.store','uses'=>'BannerController@store']);
        Route::post('banner-update/{id}',['as'=>'banner.update','uses'=>'BannerController@update']);
        Route::get('banner-destroy/{id}',['as'=>'banner.distroy','uses'=>'BannerController@destroy'] );
        //Product
        Route::get('product-show',['as'=>'product.show','uses'=>'ProductController@show'] );
        Route::get('product-create',['as'=>'product.create','uses'=>'ProductController@create'] );
        Route::post('product-store',['as'=>'product.store','uses'=>'ProductController@store'] );
        Route::get('show-images/{id}',['as'=>'show.images','uses'=>'ProductController@showImages'] );
        Route::post('update-image/{id}',['as'=>'update.image','uses'=>'ProductController@updateImage']);
        Route::post('store-image/{id}',['as'=>'store.image','uses'=>'ProductController@storeImage']);
        Route::get('destroy-image/{id}',['as'=>'destroy.image', 'uses'=>'ProductController@destroyImage']);
        Route::get('product-edit/{id}',['as'=>'product.edit','uses'=>'ProductController@edit'] );
        Route::post('product-update/{id}',['as'=>'product.update','uses'=>'ProductController@update'] );
        Route::get('product-destroy/{id}',['as'=>'product.destroy','uses'=>'ProductController@destroy'] );
        Route::get('create-price/{id}',['as'=>'create.price','uses'=>'ProductController@createPrice'] );
        Route::post('store-price/{id}',['as'=>'store.price','uses'=>'ProductController@storePrice'] );
        Route::get('show-pricelist/{id}',['as'=>'show.pricelist','uses'=>'ProductController@showPricelist'] );
        Route::get('destroy-price/{id}',['as'=>'destroy.price','uses'=>'ProductController@destroyPrice'] );
        //Customer
        Route::get('customer-show',['as'=>'customer.show','uses'=>'CustomerController@show'] );
        Route::get('test',[CustomerController::class,'demo']);
        Route::get('show-address/{id}',['as'=>'show.address','uses'=>'CustomerController@showAddress'] );
        Route::get('show-order/{id}',['as'=>'show.order','uses'=>'CustomerController@showOrder'] );
        Route::POST('store-wallet',['as'=>'store.wallet','uses'=>'CustomerController@storeWallet']);
        //Wishlist
        Route::get('show-wishlist/{id}',['as'=>'show.wishlist','uses'=>'CustomerController@showWishlist'] );
       //Order
        Route::get('order-show',['as'=>'order.show','uses'=>'OrderController@show'] );
        Route::get('show-order-product/{id}',['as'=>'show.order.product','uses'=>'OrderController@showOrderProduct'] );
        Route::get('edit-status/{id}',['as'=>'edit.status','uses'=>'OrderController@editStatus'] );
        Route::post('update-status/{id}',['as'=>'update.status','uses'=>'OrderController@updateStatus'] );
        //Menu
        Route::get('menu-show',['as'=>'menu.show','uses'=>'MenuController@show'] );
        Route::get('menu-create',['as'=>'menu.create','uses'=>'MenuController@create'] );
        Route::post('store-menu',['as'=>'store.menu','uses'=>'MenuController@store'] );
        Route::get('menu-edit/{id}',['as'=>'menu.edit','uses'=>'MenuController@edit'] );
        Route::post('update-menu/{id}',['as'=>'update.menu','uses'=>'MenuController@update'] );
        Route::get('destroy-menu/{id}',['as'=>'destroy.menu','uses'=>'MenuController@destroy'] );
        //Material
        Route::get('material.show',['as'=>'material.show','uses'=>'MaterialController@show'] );
        Route::get('material-create',['as'=>'material.create','uses'=>'MaterialController@create'] );
        Route::post('material-store',['as'=>'material.store','uses'=>'MaterialController@store'] );
        Route::get('material-edit/{id}',['as'=>'material.edit','uses'=>'MaterialController@edit'] );
        Route::post('material-update/{id}',['as'=>'material.update','uses'=>'MaterialController@update'] );
        Route::get('material-destroy/{id}',['as'=>'material.destroy','uses'=>'MaterialController@destroy'] );
        //Coupon
        Route::get('coupon-show',['as'=>'coupon.show','uses'=>'CouponController@show'] );
        Route::post('coupon-store',['as'=>'coupon.store','uses'=>'CouponController@store'] );
        Route::get('coupon-destroy/{id}',['as'=>'coupon.destroy','uses'=>'CouponController@destroy'] );
        
    }); 

});
// User Routes
Route::group(['namespace'=>'User'],function(){

    Route::get('/',['as'=>'home','uses'=>'UserController@index']);
    Route::post('search',['as'=>'search','uses'=>'UserController@search']);
    Route::post('user-register',['as'=>'user.register','uses'=>'RegisterController@userRegister']);
    Route::post('user-login',['as'=>'user.login','uses'=>'LoginController@userLogin']);
    Route::get('user-logout',['as'=>'user.logout','uses'=>'LoginController@userLogout']);
    Route::post('user-sendmail',['as'=>'user.sendmail','uses'=>'LoginController@sendMail']);
    Route::get('single-product/{id}',['as'=>'single.product','uses'=>'ProductController@showSingleProduct']);
    Route::get('products/{name}',['as'=>'products.show','uses'=>'ProductController@show']);
    Route::get('banner-product/{id}',['as'=>'banner.show','uses'=>'ProductController@showBanner']);
    Route::post('filter',['as'=>'filter','uses'=>'ProductController@filter']);
    Route::get('showresetpassword/{id}',['as'=>'showresetpassword','uses'=>'LoginController@showResetPassword']);
    Route::post('setpassword',['as'=>'setpassword','uses'=>'LoginController@setPassword']);
    // cart
    Route::get('cart',['as'=>'cart','uses'=>'CartController@index']);
    Route::get('cart/store-all',['as'=>'cart.store.all','uses'=>'CartController@storeAll']);
    Route::get('cart/{id}',['as'=>'cart.destroy','uses'=>'CartController@destroy']);
    Route::get('cart-clear',['as'=>'cart.clear','uses'=>'CartController@clear']);
    Route::get('cart-store',['as'=>'cart.store','uses'=>'CartController@store']);
    Route::get('cart-update',['as'=>'cart.update','uses'=>'CartController@update']);
   
    Route::group(['middleware'=>'CustomerCheck'],function(){
        // profile
        Route::get('profile',['as'=>'profile','uses'=>'UserController@profile']);
        Route::post('update-profile/{id}',['as'=>'update.profile','uses'=>'UserController@updateProfile']);
        Route::post('change-password',['as'=>'change.password','uses'=>'LoginController@changePassword']);
        // Address
        Route::get('address/create',['as'=>'address.create','uses'=>'AddressController@create']);
        Route::post('address',['as'=>'address.store','uses'=>'AddressController@store']);
        Route::get('address/{id}',['as'=>'address.destroy','uses'=>'AddressController@destroy']);
        // user wishlist
        Route::get('add-wishlist',['as'=>'wishlist.store','uses'=>'WishlistController@store']);
        Route::get('user-wishlist/{id}',['as'=>'wishlist.show','uses'=>'WishlistController@show']);
        Route::get('clear-wishlist/{id}',['as'=>'wishlist.clear','uses'=>'WishlistController@clear']);
        Route::get('remove-wishlist/{pid}/{cid}',['as'=>'wishlist.destroy','uses'=>'WishlistController@destroy']);
        // coupon
        Route::get('coupon',['as'=>'coupon','uses'=>'CouponController@index']);
        Route::post('coupon-check',['as'=>'coupon.check','uses'=>'CouponController@check']);
        // user order
        Route::get('orders',['as'=>'orders','uses'=>'OrderController@index']);
        Route::get('order/{id}',['as'=>'order.destroy','uses'=>'OrderController@destroy']);
        Route::get('checkout/{id}',['as'=>'checkout','uses'=>'OrderController@show']);
        Route::post('checkout',['as'=>'checkout.store','uses'=>'OrderController@store']);
        Route::get('checkout-cart',['as'=>'checkout.cart','uses'=>'OrderController@showCartCheckout']);
        Route::post('checkout-cart-store',['as'=>'checkout.cart.store','uses'=>'OrderController@storeCartCheckout']);
        //rate product
        Route::get('rate-store',['as'=>'rate.store','uses'=>'UserController@rateStore']);
        Route::post('review-store',['as'=>'review.store','uses'=>'UserController@reviewStore']);
    });
    
});


