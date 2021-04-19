<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Favorite;
class ProductController extends Controller
{
     //show product
     function showProduct($name){
        $name=decrypt($name);
        if($name=='men'|| $name=='women')
        {
            $category=Category::where('category_name',$name)->first();
            if($category!='')
            {   
                if(Auth::guard('customer')->check()){
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
                return view('user.product-list',['products'=>$products]);
            }
            else{
                return redirect('/');
            }
        }else{
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
                    $products = Product::where('status',1)
                                ->get();
                    }
                return view('user.product-list',['products'=>$products]);
            }
    }
   //single product view
    function singleProduct($id) {
        $id = decrypt($id);
        $product = Product::find($id);
        return view('user.single-product',['product'=>$product]);
    }
}
