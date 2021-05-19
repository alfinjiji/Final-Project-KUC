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
                $category_id = $category->category_id;
                if(Auth::guard('customer')->check() ){
                    $customer=Auth::guard('customer')->user()->customer_id;
                    $products = Product::where('category_id',$category_id)
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
                $products = Product::where('category_id',$category_id)
                            ->where('status',1)
                            ->get();
                }  
                $colors=Product::select('color')
                                ->where('category_id',$category_id)
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
                //for size--->
                $product_id=[];
                foreach($products as $product){
                    $product_id[]=$product->product_id;
                }
                $size_ids=ProductSize::select('size_id')->whereHas('pricelist',function($query) use ($product_id){
                    $query->WhereHas('product', function($query) use ($product_id)  {
                        $query->whereIn('product_id',$product_id);
                    });
                })->distinct()->get();
                $sizeids=[];
                foreach($size_ids as $size_id){
                    $sizeids[]=$size_id->size_id;
                }
                $sizes=Size::whereIn('size_id',$sizeids)->get();
                //<---end
                $products_asc = $products->sortBy('price')->all();
                $products_desc = $products->sortByDesc('price')->all();
                $category = $category_id;
                return view('user.product-list',compact('products','materials','colors','category','products_asc','products_desc','sizes'));
            } else {
                return redirect('/');
            }
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
        $category = explode(',',$category_id);
        $color=$request->colors;
        $colours = explode(",", $color);
        $size=$request->sizes;
        $sizes = explode(",", $size);
        $material=$request->materials;
        $material_ids = explode(",", $material);
        $colors=Product::select('color')
                                ->whereIn('category_id',$category)
                                ->where('status',1)
                                ->distinct()
                                ->get(); 
        // filter by price
        if($color=='' && $size=='' && $material==''){
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 
            $products=Product::whereIn('category_id',$category)->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }  
            // //for size--->
            // $product_id=[];
            // foreach($products as $product){
            //     $product_id[]=$product->product_id;
            // }
            // $size_ids=ProductSize::select('size_id')->whereHas('pricelist',function($query) use ($product_id){
            //     $query->WhereHas('product', function($query) use ($product_id)  {
            //         $query->whereIn('product_id',$product_id);
            //     });
            // })->distinct()->get();
            // $sizeids=[];
            // foreach($size_ids as $size_id){
            //     $sizeids[]=$size_id->size_id;
            // }
            // $sizes=Size::whereIn('size_id',$sizeids)->get();
            // //<---end
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all();
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        } 
        // filter by material and price
        elseif($color=='' && $size==''){
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 
            $products=Product::whereIn('category_id',$category)
                                ->whereIn('material_id',$material_ids)
                                ->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }  
            
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all();
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        } 
        // filter by size and price
        elseif($color=='' && $material=='') {
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 
            $products=Product::whereHas('productsize', function($query) use ($sizes) {
                                     $query->whereHas('pricelist',function($query) {
                                                        $query->where('status',1);
                                      })->whereIn('size_id',$sizes);
                                })->whereIn('category_id',$category)->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){

                      $product->price=$price_list->price;
                    }
                }
            }   
           
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all();
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        }
        // filter by color and price
        elseif($size=='' && $material==''){
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 
            $products=Product::whereIn('category_id',$category)
                                ->whereIn('color', $colours)
                                ->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }   
            
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all();
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        }
        // filter by material, color and price
        elseif($size==''){
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 
            $products=Product::whereIn('category_id',$category)
                                ->whereIn('color', $colours)
                                ->whereIn('material_id',$material_ids)
                                ->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }   
           
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all();
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        }
        // filter by material, size and price
        elseif($color==''){
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 
            // $products=Product::WhereHas('productsize', function($query) use ($sizes) {
            //     $query->whereIn('size_id',$sizes);
            // })  ->whereIn('category_id',$category)
            //     ->whereIn('material_id',$material_ids)->get();
            $products=Product::whereHas('productsize', function($query) use ($sizes) {
                $query->whereHas('pricelist',function($query) {
                                   $query->where('status',1);
                 })->whereIn('size_id',$sizes);
             })->whereIn('category_id',$category)
               ->whereIn('material_id',$material_ids)->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }   
          
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all();
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        }
        // filter by color, size and price
        elseif($material==''){
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 

            // $products=Product::WhereHas('productsize', function($query) use ($sizes) {
            //     $query->whereIn('size_id',$sizes);
            // })  ->whereIn('category_id',$category)
            //     ->whereIn('color', $colours)->get();
            $products=Product::whereHas('productsize', function($query) use ($sizes) {
                $query->whereHas('pricelist',function($query) {
                                   $query->where('status',1);
                 })->whereIn('size_id',$sizes);
             })->whereIn('category_id',$category)
                ->whereIn('color', $colours)->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }  
        
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all(); 
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        }
        // filter by all (material, color, size and price)
        else {
            $price_lists=Pricelist::whereDate('date_to','>=',$current_date)
                                   ->whereDate('date_from','<=',$current_date)
                                   ->whereBetween('price',[$min_price,$max_price])
                                   ->get(); 
            
            // $products=Product::WhereHas('productsize', function($query) use ($sizes) {
            //     $query->whereIn('size_id',$sizes);
            // })  ->whereIn('category_id',$category)
            //     ->whereIn('color', $colours)
            //     ->whereIn('material_id',$material_ids)->get();
            $products=Product::whereHas('productsize', function($query) use ($sizes) {
                $query->whereHas('pricelist',function($query) {
                                   $query->where('status',1);
                 })->whereIn('size_id',$sizes);
             })->whereIn('category_id',$category)
               ->whereIn('color', $colours)
               ->whereIn('material_id',$material_ids)->get();
            foreach($products as $product){
                $product->price=0;
                foreach($price_lists as $price_list){
                    if($product->product_id==$price_list->product_id){
                      $product->price=$price_list->price;
                    }
                }
            }   
            
            $products_asc = $products->sortBy('price')->all();
            $products_desc = $products->sortByDesc('price')->all();
            return view('user.product-list',compact('products','colors','materials','category','products_asc','products_desc'));
        }
    }
    // price variance bt size
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
    // sort 
    /*function sort($category_id, Request $request) {
        $category_id = decrypt($category_id);
        $colors=Product::select('color')
                                ->where('category_id',$category_id)
                                ->where('status',1)
                                ->distinct()
                                ->get(); 
        $materials=Material::all();
        $products = json_decode(request()->products, true);
        usort($products, function($a, $b) {
            return $a['price'] <=> $b['price'];
        });

        $products = json_encode($products);
        //$products = (object)$products;
        //return $colors[1]->color;
        return gettype($colors);
        return view('user.sort',compact('products','colors','materials','category_id'));
    } */
}
