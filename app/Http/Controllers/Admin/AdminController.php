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
   
    
    function product()
    {
        return view('admin.product');
    }
    function productEdit()
    {
        return view('admin.product_edit');
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
    function menuCreate()
    {
        return view('admin.menu_create');
    }
    function menuEdit()
    {
        return view('admin.menu_edit');
    }
    
    
}
