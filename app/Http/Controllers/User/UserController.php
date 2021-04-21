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

class UserController extends Controller
{   
    function home(){
        $banners=Banner::latest()->get();
        $categorymen=Category::where('category_name','men')->first();
        $categorywomen=Category::where('category_name','women')->first();
        $mennew=Product::where('category_id',$categorymen->category_id)
                      ->where('status',1)->latest()->get();
        $womennew=Product::where('category_id',$categorywomen->category_id)
                      ->where('status',1)->latest()->get();
        $latestproduct=Product::latest()->get();
        $menus=Menu::latest()->get();
        $products=OrderLine::select('product_id')->groupBy('product_id')->get();        
       //return $products;
        return view('user.homepage',['banners'=>$banners,'mennew'=>$mennew,'womennew'=>$womennew,'latestproduct'=>$latestproduct,'menus'=>$menus]);
    }
    function profile(){
        return view('user.profile');
    }
    function updateProfile(Request $request, $id){
        $id = decrypt($id);
        $customer = Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->save();
        return redirect()->route('profile')->with('message', 'Profile updated successfully!');
    }
    
    
    function search(){
        return view('user.search-result');
    }
    function singleProduct(){
        return view('user.single-product');
    }
}
