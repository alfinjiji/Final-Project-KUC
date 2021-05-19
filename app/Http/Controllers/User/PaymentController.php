<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use App\Models\Payment;
use App\Models\Coupon;
use App\Models\Pricelist;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Cart;
use App\Models\Wallet;
use App\Models\Customer;
use Session;
use Redirect;

class PaymentController
{
    // single product payment
    function store(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $payment->capture(array('amount'=>$payment['amount']));
            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        $coupon_code = $request->coupon_code;
        $qty = $request->quantity;
        $productsize_id = $request->productsize_id;
        $current_date = date('Y-m-d');
        $discount = 0;
        $coupon_id = Null;
        $pricelist=Pricelist::select('price')
                 ->whereDate('date_to','>=',$current_date)
                 ->whereDate('date_from','<=',$current_date)
                 ->where('productsize_id',$productsize_id)
                 ->first();
        $count = Coupon::where('code',$coupon_code)->count();
        if($count != 0){
            $coupon = Coupon::where('code',$coupon_code)->first();
            $coupon_id = $coupon->coupon_id;
            if($coupon->type == 0){
                $discount = $coupon->type_value;
            } else if($coupon->type == 1) {
                $discount =  ($coupon->type_value / 100) * ($pricelist->price * $qty);
            }
        }
        $order = Order::create([
            'customer_id'=>Auth::guard('customer')->user()->customer_id,
            'customer_address_id'=>$request->address_id,
            'amount'=>($qty * $pricelist->price) - $discount,
            'discount'=>$discount,
            'coupon_id'=>$coupon_id,
            'payment_mode'=>'razorpay',
            'payment_status'=>1,
            'placed_at'=>date('Y-m-d-H-i-s'),
        ]);
        $orderline = OrderLine::create([
            'order_id'=>$order->order_id,
            'product_id'=>$request->product_id,
            'quantity'=>$qty,
            'unit_price'=>$pricelist->price,
            'sum'=>($qty * $pricelist->price) - $discount,
            'productsize_id'=>$request->productsize_id,
        ]);  
        Payment::create([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'order_id' => $order->order_id,
            'amount' => $request->amount,
        ]);
        
       // \Session::put('success', 'Payment successful');

        return response()->json(['success' => 'Payment successful']);
    }
    // cart products payment
    function cartPayment(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $payment->capture(array('amount'=>$payment['amount']));
            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        // append price to cart
        $current_date = date('Y-m-d');
        $carts = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        foreach($carts as $cart){
            $pricelistcount=Pricelist::where('productsize_id',$cart->productsize_id)
                                ->whereDate('date_to','>=',$current_date)
                                ->whereDate('date_from','<=',$current_date)
                                ->count();
            if($pricelistcount==0){
              $cart->price=0;
            }else{
              $pricelist=Pricelist::where('productsize_id',$cart->productsize_id)
                                ->whereDate('date_to','>=',$current_date)
                                ->whereDate('date_from','<=',$current_date)
                                ->first();
              $cart->price=$pricelist->price;   
            }
        }

        $coupon_code = $request->coupon_code;
        $coupon_id = Null;
        $amount = 0;
        $discount = 0;
        foreach ($carts as $cart){
            if($cart->price != 0) {
                $sum = $cart->quantity * $cart->price;
                $amount = $amount + $sum;
            }
        }
        $coupon_count = Coupon::where('code',$coupon_code)->count();
        if($coupon_count != 0){
            $coupon = Coupon::where('code',$coupon_code)->first();
            $coupon_id = $coupon->coupon_id;
            if($coupon->type == 0){
                $discount = $coupon->type_value;
            } else if($coupon->type == 1) {
                $discount =  ($coupon->type_value / 100) * ($amount);
            }
        }
        $total_amount = $amount-$discount;
        $order = Order::create([
            'customer_id'=>Auth::guard('customer')->user()->customer_id,
            'customer_address_id'=>$request->address_id,
            'amount'=>$total_amount,
            'discount'=>$discount,
            'coupon_id'=>$coupon_id,
            'payment_mode'=>'razorpay',
            'payment_status'=>1,
            'placed_at'=>date('Y-m-d-H-i-s'),
        ]);
        foreach($carts as $cart) {
           if($cart->price!=0){
                 $sum = $cart->quantity * $cart->price;
                 $orderline = OrderLine::create([
                     'order_id'=>$order->order_id,
                     'product_id'=>$cart->product_id,
                     'quantity'=>$cart->quantity,
                     'unit_price'=>$cart->price,
                     'sum'=>$sum,
                     'productsize_id'=>$cart->productsize_id,
                 ]);
                 Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)
                             ->where('cart_id',$cart->cart_id)->delete();
             }
        }
        Payment::create([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'order_id' => $order->order_id,
            'amount' => $request->amount,
        ]);

        return response()->json(['success' => 'Payment successful']);
    }
     // Wallet Top
     function walletTopup(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $payment->capture(array('amount'=>$payment['amount']));
            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        $customer = Customer::find(Auth::guard('customer')->user()->customer_id);
        $customer->wallet_amount = $customer->wallet_amount + $request->amount;
        $customer->save();
        Wallet::create([
            'customer_id'=>Auth::guard('customer')->user()->customer_id,
            'amount'=>$request->amount,
            'flag'=>0,
        ]);
        Payment::create([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'amount' => $request->amount,
        ]);

        return response()->json(['success' => 'Payment successful']);
    }
}
