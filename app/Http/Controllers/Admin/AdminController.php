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
    function order()
    {
        return view('admin.order');
    }
    function orderProduct()
    {
        return view('admin.order_product');
    }
    
    
}
