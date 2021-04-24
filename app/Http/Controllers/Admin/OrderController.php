<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;

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
        return redirect()->route('order.show')->with('message','Order status updated!');
    }
}
