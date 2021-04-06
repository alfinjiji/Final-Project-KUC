<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Coupon;
class AdminController extends Controller
{
    function demo()
    {
        return view('admin.form');
    }
    function dashboard()
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $order=Order::count();
        $customer=Customer::count();
        $product=Product::count();
        $coupon=Coupon::count();
        return view('admin.dashboard',['order'=>$order,'customer'=>$customer,'product'=>$product,'coupon'=>$coupon]);
    }
}
