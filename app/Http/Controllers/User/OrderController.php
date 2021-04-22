<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerAddress;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Cart;

class OrderController extends Controller
{
    // view checkout page
    function checkout($id){
        $id = decrypt($id);
        $addresses = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $address_count = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
        $product = Product::find($id);
        return view('user.checkout',['addresses'=>$addresses,'address_count'=>$address_count, 'product'=>$product]);
    }
    // add to orders
    function doCheckout(Request $request) {
        if($request->payment_mode == 'cod'){
            $order = Order::create([
                'customer_id'=>Auth::guard('customer')->user()->customer_id,
                'customer_address_id'=>$request->address_id,
                'amount'=>$request->amount,
                'discount'=>$request->discount,
                'coupon_id'=>$request->coupon_id,
                'placed_at'=>date('Y-m-d-H-i-s'),
            ]);
            $orderline = OrderLine::create([
                'order_id'=>$order->order_id,
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity,
                'unit_price'=>$request->unit_price,
                'sum'=>$request->amount,
            ]);
            return redirect()->route('home');
        } else if($request->payment_mode == 'wallet') {
            return "wallet payment";
        } else {
            return "not valid payment";
        }
        
    }
    // view cart-checkout page
    function cartCheckout(){
        $cart = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $cart_count = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
        $addresses = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $address_count = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
        return view('user.cart_checkout',['cart'=>$cart, 'summary'=>$cart, 'cart_count'=>$cart_count, 'address_count'=>$address_count, 'addresses'=>$addresses]);
    }
    // order all products in cart
    function doCartCheckout(Request $request){
        $order = Order::create([
            'customer_id'=>Auth::guard('customer')->user()->customer_id,
            'customer_address_id'=>$request->address_id,
            'amount'=>$request->amount,
            'discount'=>$request->discount,
            'coupon_id'=>$request->coupon_id,
            'placed_at'=>date('Y-m-d-H-i-s'),
        ]);
        $cart = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        foreach($cart as $cart){
            $sum = $cart->quantity * $cart->product->pricelist->price;
            $orderline = OrderLine::create([
                'order_id'=>$order->order_id,
                'product_id'=>$cart->product_id,
                'quantity'=>$cart->quantity,
                'unit_price'=>$cart->product->pricelist->price,
                'sum'=>$sum,
            ]);
        }
        $cart = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->delete();
        return redirect()->route('home');
    }
    // order view
    function orderView(){
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $orders=Order::where('customer_id',$customer_id)->latest()->get();
        return view('user.order',['orders'=>$orders]);
    }
}
