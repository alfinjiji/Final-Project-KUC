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
use App\Models\Pricelist;
use App\Models\Material;
use App\Models\ProductSize;
use App\Models\Size;

class ProductController 
{
    //show product
    function show($name){
        $current_date = date('Y-m-d');
        $name=decrypt($name);
        $materials=Material::all();
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
                $products = Product::where('category_id',$category->category_id)
                            ->where('status',1)
                            ->get();
                
                }      
                $colors=Product::select('color')
                                ->where('category_id',$category->category_id)
                                ->where('status',1)
                                ->distinct()
                                ->get();        
                $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                       ->whereDate('date_from','<=',$current_date)
                                       ->get();
                foreach($products as $product){
                   $product->price=0;
                   foreach($price_lists as $price_list){
                       if($product->product_id==$price_list->product_id){
                            $product->price=$price_list->price;
                        }
                    }
                }
                return view('user.product-list',compact('products','materials','colors'));
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
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                    ->whereDate('date_from','<=',$current_date)
                                    ->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                         $product->price=$price_list->price;
                     }
                 }
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
       
        $productsizes=ProductSize::whereHas('pricelist', function($query) {$current_date = date('Y-m-d');
            $query->whereDate('date_to','>=',$current_date)
                 ->whereDate('date_from','<=',$current_date);
                 })->where('product_id',$product->product_id)->get();
        return view('user.single-product',compact('product','cart','review_count','reviews','similar_products','productsizes'));
    }
    //banner product
    function showBanner($id){
        $banner=Banner::find(decrypt($id))->first();
        return redirect($banner->url);
    }
    // filter
    function filter(Request $request){
        $materials=Material::all();
        $current_date = date('Y-m-d');
        $min_price=$request->min_price;
        $max_price=$request->max_price;
        $category_id=$request->category;
        $color=$request->colors;
        $size=$request->sizes;
        $material=$request->materials;
        $colours = explode(",", $color);
        $material_ids = explode(",", $material);
        $sizes = explode(",", $size);
        $colors=Product::select('color')
                                ->where('category_id',$category_id)
                                ->where('status',1)
                                ->distinct()
                                ->get();        
        if($color=='' && $sizes=='' && $material==''){
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get();
            $products=Product::where('category_id',$category_id)->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }
            return view('user.product-list',compact('products','colors','materials'));
        }
       
               /*$length=count($colours);
                for($i=1;$i<$length;$i++){
                $product1=Product::where('category_id',$category_id)
                                   ->where('color',$colours[$i-1])
                                   ->get();
                $product2=Product::where('category_id',$category_id)
                                  ->where('color',$colours[$i])
                                  ->get();
                $result=$product1->merge($product2);
                $final_result=$pre_result->merge($result);
                $pre_result=$result;
              }*/
        
              
        
        
        

        
    }
    function sizeVariant(Request $request){
        $productsize_id=$request->productsize_id;
        $current_date = date('Y-m-d');
        $price=Pricelist::select('price')
                             ->whereDate('date_to','>=',$current_date)
                             ->whereDate('date_from','<=',$current_date)
                             ->where('productsize_id',$productsize_id)
                             ->first();
         $customer=Auth::guard('customer')->user()->customer_id;
         $count=Cart::where('customer_id',$customer)->where('productsize_id',$productsize_id)->count();
         if($count==0){
           return response()->json(['price'=>$price->price,'flag'=>0]);
         }else{
            return response()->json(['price'=>$price->price,'flag'=>1]);
         }
        
        
    }
}
