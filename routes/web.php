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
        Route::get('banner-show',['as'=>'banner.show','uses'=>'BannerController@show'] );
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
        Route::get('edit-status/{id}',['as'=>'edit.status','uses'=>'OrderController@editStatust'] );
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

    Route::get('/',['as'=>'home','uses'=>'UserController@home']);
    Route::get('search',['as'=>'search','uses'=>'UserController@search']);
    Route::get('single-product/{id}',['as'=>'single.product','uses'=>'ProductController@singleProduct']);
    Route::post('user-register',['as'=>'user.register','uses'=>'RegisterController@userRegister']);
    Route::post('user-login',['as'=>'user.login','uses'=>'LoginController@userLogin']);
    Route::get('user-logout',['as'=>'user.logout','uses'=>'LoginController@userLogout']);
    Route::get('show-product/{name}',['as'=>'show.product','uses'=>'ProductController@showProduct']);
    Route::get('cart',['as'=>'cart','uses'=>'CartController@viewCart']);
    Route::get('addallto-cart',['as'=>'addallto.cart','uses'=>'CartController@addAllToCart']);
    Route::get('delete-cart/{id}',['as'=>'delete.cart','uses'=>'CartController@deleteCart']);
    Route::get('clear-cart',['as'=>'clear.cart','uses'=>'CartController@clearCart']);
    Route::get('addto-cart',['as'=>'addto.cart','uses'=>'CartController@addToCart']);
    Route::get('quantity-update',['as'=>'quantity.update','uses'=>'CartController@quantityUpdate']);
    Route::get('viewbanner-product/{id}',['as'=>'viewbanner.product','uses'=>'ProductController@viewbannerProduct']);
    Route::group(['middleware'=>'CustomerCheck'],function(){
        // profile
        Route::get('profile',['as'=>'profile','uses'=>'UserController@profile']);
        Route::post('update-profile/{id}',['as'=>'update.profile','uses'=>'UserController@updateProfile']);
        Route::post('change-password',['as'=>'change.password','uses'=>'LoginController@changePassword']);
        // Address
        Route::get('address',['as'=>'address','uses'=>'AddressController@address']);
        Route::post('add-address',['as'=>'add.address','uses'=>'AddressController@addAddress']);
        Route::get('delete-address/{id}',['as'=>'delete.address','uses'=>'AddressController@deleteAddress']);
        // user wishlist
        Route::get('add-wishlist',['as'=>'add.wishlist','uses'=>'WishlistController@addWishlist']);
        Route::get('user-wishlist/{id}',['as'=>'user.wishlist','uses'=>'WishlistController@userWishlist']);
        Route::get('clear-wishlist/{id}',['as'=>'clear.wishlist','uses'=>'WishlistController@clearWishlist']);
        Route::get('delete-singlewishlist/{pid}/{cid}',['as'=>'delete.singlewishlist','uses'=>'WishlistController@deleteSingleWishlist']);
        // coupon
        Route::get('coupon-view',['as'=>'coupon.view','uses'=>'CouponController@couponView']);
        Route::post('coupon-check',['as'=>'coupon.check','uses'=>'CouponController@couponCheck']);
        // user order
        Route::get('checkout/{id}',['as'=>'checkout','uses'=>'OrderController@checkout']);
        Route::post('do-checkout',['as'=>'do.checkout','uses'=>'OrderController@doCheckout']);
        Route::get('cart-checkout',['as'=>'cart.checkout','uses'=>'OrderController@cartCheckout']);
        Route::post('do-cart-checkout',['as'=>'do.cart.checkout','uses'=>'OrderController@doCartCheckout']);
        Route::get('order-view',['as'=>'order.view','uses'=>'OrderController@orderView']);
        Route::get('order-cancel/{id}',['as'=>'order.cancel','uses'=>'OrderController@orderCancel']);
  
    });
    
});


