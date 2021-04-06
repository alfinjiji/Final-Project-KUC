<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\customerAddress;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Favorite;
class CustomerController extends Controller
{
    function customer()
    {
        $customer=Customer::latest()->get();
        return view('admin.customer.customer',['cust'=>$customer]);
        //return view('admin.customer');
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
        return view('admin.customer.wishlist');
    }
    function customerOrder($id)
    {  
         $id=decrypt($id);
        $order=Order::where('customer_id','=',$id)->get();
        //$orderid=$order->order_id;
        $product=OrderLine::where('order_id','=',1)->get();
        return view('admin.customer.customer_order',['order'=>$order,'product'=>$product]);
    }
}
