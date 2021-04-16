<?php

namespace App\Http\Controllers\User;
use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function home(){
        return view('user.homepage');
    }
    function cart(){
        return view('user.cart');
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
    
    function address(){
        return view('user.address');
    }
    function search(){
        return view('user.search-result');
    }
    function singleProduct(){
        return view('user.single-product');
    }
    
    //show product
    function showProduct($name){
        $name=decrypt($name);
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
    }
}
