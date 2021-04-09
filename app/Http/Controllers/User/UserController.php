<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
