<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function demo()
    {
        return view('admin.form');
    }
    function dashboard()
    {
        return view('admin.dashboard');
    }
<<<<<<< HEAD
   
    
    function product()
    {
        return view('admin.product');
    }
    function productEdit()
    {
        return view('admin.product_edit');
    }
   
=======
    function banner()
    {
        return view('admin.banner');
    }
    function bannerEdit()
    {
        return view('admin.banner_edit');
    }
    function customer()
    {
        return view('admin.customer');
    }
    function customerAddress()
    {
        return view('admin.customer_address');
    }
    function wishlist()
    {
        return view('admin.wishlist');
    }
    function customerOrder()
    {
        return view('admin.customer_order');
    }
>>>>>>> b0ad5c778a6e1d263df8fdecc6b76826f58a180d
    function order()
    {
        return view('admin.order');
    }
    function orderProduct()
    {
        return view('admin.order_product');
    }
<<<<<<< HEAD
    function menu()
    {
        return view('admin.menu');
    }
    function menuCreate()
    {
        return view('admin.menu_create');
    }
    function menuEdit()
    {
        return view('admin.menu_edit');
    }
    
    
=======
    function coupon()
    {
        return view('admin.coupon');
    }
>>>>>>> b0ad5c778a6e1d263df8fdecc6b76826f58a180d
}
