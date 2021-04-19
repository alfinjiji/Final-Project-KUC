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
        Route::get('dashboard',['as'=>'dashboard','uses'=>'AdminController@dashboard'] );
        //Category
        Route::get('category',['as'=>'category','uses'=>'CategoryController@CategoryView'] );
        Route::get('category-create',['as'=>'category.create','uses'=>'CategoryController@CategoryCreate'] );
        Route::get('category-edit/{id}',['as'=>'category.edit','uses'=>'CategoryController@categoryEdit'] );
        Route::post('category-add',['as'=>'category.add','uses'=>'CategoryController@CategoryAdd'] );
        Route::post('category-update/{id}',['as'=>'category.update','uses'=>'CategoryController@CategoryUpdate'] );
        Route::get('category-delete/{id}',['as'=>'category.delete','uses'=>'CategoryController@CategoryDelete'] );
       //Banner
        Route::get('banner',['as'=>'banner','uses'=>'BannerController@banner'] );
        Route::get('banner-edit/{id}',['as'=>'banner.edit','uses'=>'BannerController@bannerEdit'] );
        Route::post('banner-uplaod',['as'=>'banner.upload','uses'=>'BannerController@BannerUpload']);
        Route::post('do-banner-edit/{id}',['as'=>'do.banner.edit','uses'=>'BannerController@DobannerEdit']);
        Route::get('banner-delete/{id}',['as'=>'banner.delete','uses'=>'BannerController@bannerdelete'] );
        //Product
        Route::get('product',['as'=>'product','uses'=>'ProductController@product'] );
        Route::get('product-create',['as'=>'product.create','uses'=>'ProductController@productCreate'] );
        Route::post('do-product-create',['as'=>'do.product.create','uses'=>'ProductController@doProductCreate'] );
        Route::get('product-edit/{id}',['as'=>'product.edit','uses'=>'ProductController@productEdit'] );
        Route::post('do-product-edit/{id}',['as'=>'do.product.edit','uses'=>'ProductController@doProductEdit'] );
        Route::get('product-delete/{id}',['as'=>'product.delete','uses'=>'ProductController@productDelete'] );
        Route::get('product-add-price/{id}',['as'=>'product.add.price','uses'=>'ProductController@productAddPrice'] );
        Route::post('do-product-add-price/{id}',['as'=>'do.product.add.price','uses'=>'ProductController@doProductAddPrice'] );
        Route::get('product-pricelist/{id}',['as'=>'product.pricelist','uses'=>'ProductController@productPricelist'] );
        Route::get('product-pricelist-delete/{id}',['as'=>'product.pricelist.delete','uses'=>'ProductController@productPricelistDelete'] );
        //Customer
        Route::get('customer',['as'=>'customer','uses'=>'CustomerController@customer'] );
        Route::get('test',[CustomerController::class,'demo']);
        Route::get('customer-address/{id}',['as'=>'customer.address','uses'=>'CustomerController@customerAddress'] );
        Route::get('customer-order/{id}',['as'=>'customer.order','uses'=>'CustomerController@customerOrder'] );
        //Wishlist
        Route::get('wishlist/{id}',['as'=>'wishlist','uses'=>'CustomerController@wishlist'] );
       //Order
        Route::get('order',['as'=>'order','uses'=>'OrderController@order'] );
        Route::get('order-product/{id}',['as'=>'order.product','uses'=>'OrderController@orderProduct'] );
        Route::get('order-status-update/{id}',['as'=>'order.status.update','uses'=>'OrderController@orderStatusUpdate'] );
        Route::post('do-order-status-update/{id}',['as'=>'do.order.status.update','uses'=>'OrderController@doOrderStatusUpdate'] );
        //Menu
        Route::get('menu',['as'=>'menu','uses'=>'MenuController@menu'] );
        Route::get('menu-create',['as'=>'menu.create','uses'=>'MenuController@menuCreate'] );
        Route::post('do-menu-create',['as'=>'do.menu.create','uses'=>'MenuController@doMenuCreate'] );
        Route::get('menu-edit/{id}',['as'=>'menu.edit','uses'=>'MenuController@menuEdit'] );
        Route::post('do-menu-edit/{id}',['as'=>'do.menu.edit','uses'=>'MenuController@doMenuEdit'] );
        Route::get('menu-delete/{id}',['as'=>'menu.delete','uses'=>'MenuController@menuDelete'] );
        //Material
        Route::get('material',['as'=>'material','uses'=>'MaterialController@material'] );
        Route::get('material-create',['as'=>'material.create','uses'=>'MaterialController@materialCreate'] );
        Route::post('do-material-create',['as'=>'do.material.create','uses'=>'MaterialController@domaterialCreate'] );
        Route::get('material-edit/{id}',['as'=>'material.edit','uses'=>'MaterialController@materialEdit'] );
        Route::post('do-material-edit/{id}',['as'=>'do.material.edit','uses'=>'MaterialController@domaterialEdit'] );
        Route::get('material-delete/{id}',['as'=>'material.delete','uses'=>'MaterialController@materialDelete'] );
        //Coupon
        Route::get('coupon',['as'=>'coupon','uses'=>'CouponController@coupon'] );
        Route::post('coupon-add',['as'=>'coupon.add','uses'=>'CouponController@couponAdd'] );
        Route::get('coupon-delete/{id}',['as'=>'coupon.delete','uses'=>'CouponController@coupondelete'] );
        
    }); 

});
// User Routes
Route::group(['namespace'=>'User'],function(){

    Route::get('/',['as'=>'home','uses'=>'UserController@home']);
    Route::get('cart',['as'=>'cart','uses'=>'UserController@cart']);
    Route::get('search',['as'=>'search','uses'=>'UserController@search']);
    Route::get('single-product',['as'=>'single.product','uses'=>'ProductController@singleProduct']);
    Route::post('user-register',['as'=>'user.register','uses'=>'RegisterController@userRegister']);
    Route::post('user-login',['as'=>'user.login','uses'=>'LoginController@userLogin']);
    Route::get('user-logout',['as'=>'user.logout','uses'=>'LoginController@userLogout']);
    Route::get('show-product/{name}',['as'=>'show.product','uses'=>'ProductController@showProduct']);

    Route::group(['middleware'=>'CustomerCheck'],function(){
        Route::get('profile',['as'=>'profile','uses'=>'UserController@profile']);
        Route::post('update-profile/{id}',['as'=>'update.profile','uses'=>'UserController@updateProfile']);
        Route::get('address',['as'=>'address','uses'=>'UserController@address']);
        Route::post('change-password',['as'=>'change.password','uses'=>'LoginController@changePassword']);
        // user wishlist
        Route::get('add-wishlist',['as'=>'add.wishlist','uses'=>'WishlistController@addWishlist']);
        Route::get('user-wishlist/{id}',['as'=>'user.wishlist','uses'=>'WishlistController@userWishlist']);
        Route::get('clear-wishlist/{id}',['as'=>'clear.wishlist','uses'=>'WishlistController@clearWishlist']);
        Route::get('delete-singlewishlist/{pid}/{cid}',['as'=>'delete.singlewishlist','uses'=>'WishlistController@deleteSingleWishlist']);

    });
    
});


