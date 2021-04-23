<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerAddress;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Cart;
use App\Models\Wallet;

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
        // cod 
        if($request->payment_mode == 'cod'){
            $order = Order::create([
                'customer_id'=>Auth::guard('customer')->user()->customer_id,
                'customer_address_id'=>$request->address_id,
                'amount'=>$request->amount,
                'discount'=>$request->discount,
                'coupon_id'=>$request->coupon_id,
                'payment_mode'=>$request->payment_mode,
                'payment_status'=>0,
                'placed_at'=>date('Y-m-d-H-i-s'),
            ]);
            $orderline = OrderLine::create([
                'order_id'=>$order->order_id,
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity,
                'unit_price'=>$request->unit_price,
                'sum'=>$request->quantity*$request->unit_price,
            ]);
            return redirect()->route('home');
            // wallet payment
        } else if($request->payment_mode == 'wallet') {
            $order = Order::create([
                'customer_id'=>Auth::guard('customer')->user()->customer_id,
                'customer_address_id'=>$request->address_id,
                'amount'=>$request->amount,
                'discount'=>$request->discount,
                'coupon_id'=>$request->coupon_id,
                'payment_mode'=>$request->payment_mode,
                'payment_status'=>1,
                'placed_at'=>date('Y-m-d-H-i-s'),
            ]);
            $orderline = OrderLine::create([
                'order_id'=>$order->order_id,
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity,
                'unit_price'=>$request->unit_price,
                'sum'=>$request->quantity*$request->unit_price,
            ]);
            $customer = Customer::find(Auth::guard('customer')->user()->customer_id);
            $customer->wallet_amount = $customer->wallet_amount - $request->amount;
            $customer->save();
            Wallet::create([
                'customer_id'=>$customer->customer_id,
                'amount'=>$request->amount,
                'flag'=>1,
            ]);
            return redirect()->route('home');
        } else {
            return "not valid payment";
        }
        
    }
    // view cart-checkout page
    function cartCheckout(){
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $cart = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $cart_count = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
        $addresses = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $address_count = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
        $wallet=Customer::find($customer_id);
        return view('user.cart_checkout',['cart'=>$cart, 'summary'=>$cart, 'cart_count'=>$cart_count, 'address_count'=>$address_count, 'addresses'=>$addresses,'wallet'=>$wallet]);
    }
    // order all products in cart
    function doCartCheckout(Request $request){
        $paymethod=$request->pay_method;
        if($paymethod=='cod')
        {
               $order = Order::create([
               'customer_id'=>Auth::guard('customer')->user()->customer_id,
               'customer_address_id'=>$request->address_id,
               'amount'=>$request->amount,
               'discount'=>$request->discount,
               'coupon_id'=>$request->coupon_id,
               'payment_mode'=>$paymethod,
               'payment_status'=>0,
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
       elseif($paymethod=='wallet'){
             $order = Order::create([
                 'customer_id'=>Auth::guard('customer')->user()->customer_id,
                 'customer_address_id'=>$request->address_id,
                 'amount'=>$request->amount,
                 'discount'=>$request->discount,
                 'coupon_id'=>$request->coupon_id,
                 'payment_mode'=>$paymethod,
                 'payment_status'=>1,
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
                  Wallet::create([ 
                 'customer_id'=>Auth::guard('customer')->user()->customer_id,
                 'amount'=>$request->amount,
                 'flag'=>'1',
                 ]);
                 $customer=Customer::find(Auth::guard('customer')->user()->customer_id);
                  $customer->wallet_amount=$customer->wallet_amount - $request->amount;
                  $customer->save();
             return redirect()->route('home');
     
       }
    }
    // order view
    function orderView(){
        $current_date = date('Y-m-d');
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $deliveredorders=Order::where('customer_id',$customer_id)
                                ->where('delivered_at','<=',$current_date)->latest()
                                ->get();
        $penddingorders=Order::where('customer_id',$customer_id)
        ->where('delivered_at','=',NULL)->latest()
        ->get();
        return view('user.order',['deliveredorders'=>$deliveredorders,'pendingorders'=>$penddingorders]);
    }

    function orderCancel($id){
        $orderline=OrderLine::find($id);
        $sum=$orderline->sum;                                 // unit price * Qty of selected product
        $order_id=$orderline->order_id;
        $order=Order::find($order_id);
        $paymentmode=$order->payment_mode;
        $customer_id=$order->customer_id;
        $amount=$order->amount;                                 // total paid amount (discount-grand total)
        $discount=$order->discount; 
        $wallet=0;  
        //return $sum." ".$amount." ".$discount;                           // discount
        if($paymentmode=='wallet'){
            $percent=($sum*100)/($amount+$discount);   
            //return $percent;        // % of single product in total amount
               if($percent==100){
                   //return $amount;
                 $wallet=$amount; //50
               }else{
                 $discountpercent=($discount*$percent)/100;       // discount % of single product 
                 $wallet=round($sum-$discountpercent);            
               }
            $orderline=OrderLine::find($id)->delete();
            $count=OrderLine::where('order_id',$order_id)->count();
                if($count==0){
                     $order=Order::find($order_id)->delete();
                     //return $wallet;
                    Wallet::create([ 
                    'customer_id'=>$customer_id,
                    'amount'=>$wallet,
                    'flag'=>'0',
                     ]);
                     $customer=Customer::find($customer_id);
                     $customer->wallet_amount=$customer->wallet_amount+$wallet;
                     $customer->save();
                     return redirect()->back();
                 }else{
                     Wallet::create([ 
                    'customer_id'=>$customer_id,
                    'amount'=>$wallet,
                    'flag'=>'0',
                    ]);
                     $order=Order::find($order_id);
                     $order->amount= $order->amount-$wallet;
                     $order->discount=round($order->discount-($discount*($percent/100)));
                     $order->save();
                     $customer=Customer::find($customer_id);
                     $customer->wallet_amount=$customer->wallet_amount+$wallet;
                     $customer->save();
                     return redirect()->back();
                }
        }else{
            $orderline=OrderLine::find($id)->delete();
            $count=OrderLine::where('order_id',$order_id)->count();
            if($count==0){
                 $order=Order::find($order_id)->delete();
                 return redirect()->back();
            }else{
                 $percent=($sum*100)/($amount+$discount);
                 $discountpercent=($discount*$percent)/100;
                 $wallet=round($sum-$discountpercent);
                 $order=Order::find($order_id);
                 $order->amount= $order->amount-$wallet;
                 $order->discount=round($order->discount-($discount*($percent/100)));
                 $order->save();
                 return redirect()->back();
            }
        }
        
    }
}
