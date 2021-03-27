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
    function categoryCreate()
    {
        return view('admin.category_create');
    }
    function categoryEdit()
    {
        return view('admin.category_edit');
    }
    function banner()
    {
        return view('admin.banner');
    }
    function bannerEdit()
    {
        return view('admin.banner_edit');
    }
    function product()
    {
        return view('admin.product');
    }
    function productEdit()
    {
        return view('admin.product_edit');
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
    function orderProduct()
    {
        return view('admin.order_product');
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
