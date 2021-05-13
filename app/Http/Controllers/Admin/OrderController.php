<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Rating;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Mail\OrderConfirm;
use App\Mail\OrderDelivered;

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
            $customer_id=$order->customer_id;
            $customer=Customer::where('customer_id',$customer_id)->first();
            $email=$customer->email;
            $details=[ 
                'url' =>'http://localhost/Project/orders',
                'name'=>$customer->first_name
            ];
     
           Mail::to($email)->send(new OrderDelivered($details));
        }
        if( $request->status==2){
            $customer_id=$order->customer_id;
            $customer=Customer::where('customer_id',$customer_id)->first();
            $email=$customer->email;
            $orderlines=Orderline::where('order_id',decrypt($id))->get();
            $url='http://localhost/Project/orders';
                $details=[ 
                   'url' =>$url,
                   'first_name'=>$customer->first_name,
                   'last_name'=>$customer->last_name,
                   'addressline1'=>$order->address->house_name.'  '.$order->address->area,
                   'addressline2'=>$order->address->city.' '.$order->address->state.'-'.$order->address->pincode,
                   'addressline3'=>$order->address->mobile,
                    'subtotal'=>$order->amount + $order->discount,
                    'discount'=>$order->discount,
                    'total'=>$order->amount

               ];
        
              Mail::to($email)->send(new OrderConfirm($details,$orderlines));

        }
        return redirect()->route('order.show')->with('message','Order status updated!');
    }
}
