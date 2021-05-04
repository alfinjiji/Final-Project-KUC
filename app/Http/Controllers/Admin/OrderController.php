<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Rating;

class OrderController
{
    function show(){
        $orders = Order::latest()->get();
        return view('admin.order.list',compact('orders'));
    }
    function showOrderProduct($id){
        $orderlines = Orderline::where('order_id',decrypt($id))->get();
        return view('admin.order.product',compact('orderlines'));
    }
    function editStatus($id){
        $order = Order::find(decrypt($id));
        return view('admin.order.confirm',compact('order'));
    }
    function updateStatus(Request $request, $id){
        $order = Order::find(decrypt($id));
        $order->status = $request->status;
        $order->save();
        if( $request->status==0){
            $orderlines=Orderline::where('order_id',decrypt($id))->get();
            foreach($orderlines as $orderline){
                $count=Rating::where('customer_id',Auth::guard('customer')->user()->customer_id)
                             ->where('product_id',$orderline->product_id)->count();
                if($count==0){
                   Rating::create([
                       'product_id'=> $orderline->product_id,
                       'customer_id'=>Auth::guard('customer')->user()->customer_id,
                       'rating'=>0,
                   ]);
                }
            }
        }
        return redirect()->route('order.show')->with('message','Order status updated!');
    }
}
