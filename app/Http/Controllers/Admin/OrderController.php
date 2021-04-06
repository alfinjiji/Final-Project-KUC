<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;

class OrderController extends Controller
{
    function order(){
        $orders = Order::latest()->get();
        return view('admin.order.order_list',['orders'=>$orders]);
    }
    function orderProduct($id){
        $orderline = Orderline::where('order_id',decrypt($id))->get();
        return view('admin.order.order_product',['orderline'=>$orderline]);
    }
    function orderStatusUpdate($id){
        $order = Order::find(decrypt($id));
        return view('admin.order.order_confirm',['order'=>$order]);
    }
    function doOrderStatusUpdate(Request $request, $id){
        $order = Order::find(decrypt($id));
        $order->status = $request->status;
        $order->save();
        return redirect()->route('order')->with('message','Order status updated!');
    }
}
