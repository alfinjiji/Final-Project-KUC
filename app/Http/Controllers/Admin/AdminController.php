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
    function category()
    {
        return view('admin.category');
    }
    function banner()
    {
        return view('admin.banner');
    }
    function product()
    {
        return view('admin.product');
    }
    function customer()
    {
        return view('admin.customer');
    }
    function wishlist()
    {
        return view('admin.wishlist');
    }
    function customerOrder()
    {
        return view('admin.customer_order');
    }
    function order()
    {
        return view('admin.order');
    }
    function menu()
    {
        return view('admin.menu');
    }
    function coupon()
    {
        return view('admin.coupon');
    }
}
