<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function home(){
        return view('user.homepage');
    }
    function cart(){
        return view('user.cart');
    }
    function productList(){
        return view('user.product-list');
    }
    function profile(){
        return view('user.profile');
    }
    function search(){
        return view('user.search-result');
    }
    function singleProduct(){
        return view('user.single-product');
    }
    function userWishlist(){
        return view('user.wishlist');
    }
    function userLogin(Request $request){
        $input = ['email'=>request('email'),'password'=>request('pwd')];

        if(Auth::guard('customer')->attempt($input))
        {
           // return redirect()->route('home');
            return response()->json(['success'=>1]);
        } 
        else
         {  
           // return redirect()->route('home');
            return response()->json(['error'=>0]);
         } 

    }
    public function userLogout() 
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
    
}
