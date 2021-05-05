<?php

namespace App\Http\Controllers\User;
use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\OrderLine;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;

class UserController
{   
    // home page
    function index(){
        $banners=Banner::latest()->get();
        $category_men=Category::where('category_name','men')->first();
        $category_women=Category::where('category_name','women')->first();
        $latest_men=Product::where('category_id',$category_men->category_id)
                      ->where('status',1)->latest()->get();
        $latest_women=Product::where('category_id',$category_women->category_id)
                      ->where('status',1)->latest()->get();
        $latest_product=Product::where('status',1)->latest()->get();
        $menus=Menu::latest()->get();
        $products=OrderLine::select('product_id')->groupBy('product_id')->get();        
       //return $products;
        return view('user.homepage',compact('banners','latest_men','latest_women','latest_product','menus'));
    }
    // user profile
    function profile(){
        return view('user.profile');
    }
    // update profile
    function updateProfile(Request $request, $id){
        $id = decrypt($id);
        $customer = Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->save();
        return redirect()->route('profile')->with('message', 'Profile updated successfully!');
    }
    // search
    function search(Request $request){
        $element=$request->element;
        $count=Product::where('product_name','LIKE',"%$element%")->count();
        $products=Product::where('product_name','LIKE',"%$element%")->get();
        if($count!=0){
          if(Auth::guard('customer')->check()){
              $customer=Auth::guard('customer')->user()->customer_id;
              foreach($products as $product){
                   $wishlist=Favorite::where('customer_id',$customer)
                                       ->where('product_id',$product->product_id)
                                       ->count();
                       if($wishlist != 0){
                           $product->wishlist_flag = 1;
                       } else {
                           $product->wishlist_flag = 0;
                       }
              }
          }
        }
        return view('user.search-result',compact('count','products'));
    }
    // single product
    function singleProduct(){
        return view('user.single-product');
    }
    // product rate store
    function rateStore(Request $request){
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $product_id=$request->product_id;
        $count=Rating::where('customer_id',$customer_id)
                      ->where('product_id',$product_id)
                      ->count();
        if($count==0){
            Rating::create([
                'product_id'=> $product_id,
                'customer_id'=>$customer_id,
                'rating'=>$request->rating,
            ]);
        }else{
            $rating=Rating::where('customer_id',$customer_id)
                            ->where('product_id',$product_id)
                            ->first();
            $rating->rating=$request->rating;
            $rating->save();
        }
        $count=Rating::where('product_id',$product_id)->count();
        $sum=Rating::where('product_id',$product_id)->sum('rating');
        $rate=$sum/$count;
        $product=Product::where('product_id',$product_id)->first();
        $product->rating=$rate;
        $product->save();
        return response()->json(['success'=>1]);
    }
    //review 
    function reviewStore(Request $request){
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $product_id=$request->product_id;
        $count=Review::where('customer_id',$customer_id)
                      ->where('product_id',$product_id)
                      ->count();
        if($count==0){
            Review::create([
                'product_id'=> $product_id,
                'customer_id'=>$customer_id,
                'review_summary'=>$request->summary,
                'review'=>$request->user_review,
            ]);
        }else{
            $review=Review::where('customer_id',$customer_id)
                            ->where('product_id',$product_id)
                            ->first();
            $review->review_summary=$request->summary;
            $review->review=$request->user_review;
            $review->save();
        }
       return redirect()->back();
    }
}
