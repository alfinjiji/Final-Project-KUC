<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Favorite;
use App\Models\Cart;
use App\Models\Banner;
use App\Models\Review;

class ProductController 
{
    //show product
    function show($name){
        $name=decrypt($name);
        if($name=='men'|| $name=='women') {
            $category=Category::where('category_name',$name)->first();
            if($category!='') {   
                if(Auth::guard('customer')->check() ){
                    $customer=Auth::guard('customer')->user()->customer_id;
                    $products = Product::where('category_id',$category->category_id,)
                            ->where('status',1)
                            ->get();
                    foreach ($products as $product) {
                        $wishlist=Favorite::where('customer_id',$customer)
                                        ->where('product_id',$product->product_id)
                                        ->count();
                        if($wishlist != 0){
                            $product->wishlist_flag = 1;
                        } else {
                            $product->wishlist_flag = 0;
                        }
                    }
                    //return $product;
                } else {
                $products = Product::where('category_id',$category->category_id,)
                            ->where('status',1)
                            ->get();
                }
                return view('user.product-list',compact('products'));
            } else {
                return redirect('/');
            }
        } else {
            if(Auth::guard('customer')->check()){
                $customer=Auth::guard('customer')->user()->customer_id;
                $products = Product::where('status',1)
                                    ->get();
                    foreach ($products as $product) {
                        $wishlist=Favorite::where('customer_id',$customer)
                                        ->where('product_id',$product->product_id)
                                        ->count();
                        if($wishlist != 0){
                            $product->wishlist_flag = 1;
                        } else {
                            $product->wishlist_flag = 0;
                        }
                    }
                    //return $product;
            } else {
                $products = Product::where('status',1)->get();
            }
            return view('user.product-list',compact('products'));
        }
    }
   //single product view
    function showSingleProduct($id) {
        $id = decrypt($id);
        $product = Product::find($id);
        $cart = Cart::where('product_id',$product->product_id)->count();
        if(Auth::guard('customer')->check()){
        $customer=Auth::guard('customer')->user()->customer_id;
        $wishlist=Favorite::where('customer_id',$customer)
                            ->where('product_id',$id)
                            ->count();
            if($wishlist != 0){
                $product->wishlist_flag = 1;
            } else {
                $product->wishlist_flag = 0;
            }
        }
        $review_count=Review::where('product_id',$id)->count();
        $reviews=Review::where('product_id',$id)->get();
        $name=$product->product_name;
        $category_id=$product->category_id;
        $similar_products=Product::where('category_id',$category_id)
                                   ->orwhere('product_name','LIKE',"%$name%")->paginate(6);
        return view('user.single-product',compact('product','cart','review_count','reviews','similar_products'));
    }
    //banner product
    function showBanner($id){
        $banner=Banner::find(decrypt($id))->first();
        return redirect($banner->url);
    }
}
