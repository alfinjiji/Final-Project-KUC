<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\customerAddress;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Favorite;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    function customer()
    {
        $customer =Customer::all();
        return view('admin.customer.customer',['cust'=>$customer]);
    
    }
    function customerAddress($id)
    {  
        $id=decrypt($id);
       $address=customerAddress::where('customer_id','=',$id)->get();
        return view('admin.customer.customer_address',['address'=>$address]);
    }
    function wishlist($id)
    {
        $id=decrypt($id);
        $wishlist=Favorite::where('customer_id',$id)->get();
       
        return view('admin.customer.wishlist',['wishlist'=>$wishlist]);
    }
    function customerOrder($id)
    {  
         $id=decrypt($id);
       $order=Order::where('customer_id','=',$id)->get();

        return view('admin.customer.customer_order',['order'=>$order]);
    }

    function demo()
    {
     
       
        return view('admin.banner.date');
    }
}
