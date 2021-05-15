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
use Session;
use Redirect;

class PaymentController
{
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
            'payment_status'=>0,
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
            'amount' => ($qty * $pricelist->price) - $discount,
        ]);
        
        \Session::put('success', 'Payment successful');

        return response()->json(['success' => 'Payment successful']);
    }
}
