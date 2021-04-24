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
    function search(){
        return view('user.search-result');
    }
    // single product
    function singleProduct(){
        return view('user.single-product');
    }
}
