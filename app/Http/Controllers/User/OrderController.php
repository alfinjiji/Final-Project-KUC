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
use App\Models\Rating;
use App\Models\Review; 
use App\Models\ProductSize;
use App\Models\Pricelist;
class OrderController
{
    // order view
    function index(){
        $current_date = date('Y-m-d');
        $customer_id = Auth::guard('customer')->user()->customer_id;
        $orders_delivered = Order::where('customer_id',$customer_id)
                               ->where('status','=',0)->latest()
                               ->get();
        $orders_pending = Order::where('customer_id',$customer_id)
                            ->where('status','>',0)->latest()
                            ->get();
        $ratings=Rating::where('customer_id',$customer_id)->get();
        
        foreach($ratings as $rating){
          foreach($orders_delivered as $order){
            $orderlines=OrderLine::where('order_id',$order->order_id)->get();
              foreach($orderlines as $orderline){
                    if($rating->product_id==$orderline->product_id){
                        $flag=1;
                    break;
                    }else{
                        $flag=0;
                    }
                }
               if($flag==1){
                   $rating->flag=$flag;
                break ;
               }
            }
        }
       
        /*$reviews=Review::where('customer_id',$customer_id)->get();
        foreach($reviews as $review){
            foreach($orders_delivered as $order){
              $orderlines=OrderLine::where('order_id',$order->order_id)->get();
                foreach($orderlines as $orderline){
                      if($review->product_id==$orderline->product_id){
                          $flag=1;
                      break;
                      }else{
                          $flag=0;
                      }
                  }
                 if($flag==1){
                     $review->flag=$flag;
                  break ;
                 }
              }
          }*/
        return view('user.orders',compact('orders_delivered','orders_pending','ratings'));
       }
    
    // cancel order
    function destroy($id){
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
        } else {
            $orderline=OrderLine::find($id)->delete();
            $count=OrderLine::where('order_id',$order_id)->count();
            if($count==0){
                 $order=Order::find($order_id)->delete();
                 return redirect()->back();
            } else {
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
    // view checkout page
    function show(Request $request){
        $id=$request->product_id;
        $current_date = date('Y-m-d');
        $productsize_id=$request->productsize_id;
        //return $productsize_id;
        $pricelist=Pricelist::where('productsize_id',$productsize_id)
                            ->whereDate('date_to','>=',$current_date)
                            ->whereDate('date_from','<=',$current_date)
                            ->first();
        $addresses = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $address_count = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
        $product = Product::find($id);
        return view('user.checkout',compact('addresses','address_count','product','pricelist'));
    }
    // add to orders
    function store(Request $request) {
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
                'productsize_id'=>$request->productsize_id,
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
                'productsize_id'=>$request->productsize_id,
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
    function showCartCheckout(){
        $current_date = date('Y-m-d');
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $carts = Cart::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $cart_count = 0;
        $addresses = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        $address_count = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->count();
        $wallet=Customer::find($customer_id);
        foreach($carts as $cart){
            $pricelistcount=Pricelist::where('productsize_id',$cart->productsize_id)
                                ->whereDate('date_to','>=',$current_date)
                                ->whereDate('date_from','<=',$current_date)
                                ->count();
            if($pricelistcount==0){
              $cart->price='0';
            }else{
              $pricelist=Pricelist::where('productsize_id',$cart->productsize_id)
                                ->whereDate('date_to','>=',$current_date)
                                ->whereDate('date_from','<=',$current_date)
                                ->first();
              $cart->price=$pricelist->price;   
              $cart_count=$cart_count+1;
            }
          }
          
        return view('user.cart_checkout',compact('carts','cart_count','addresses','address_count','wallet'));
    }
    // order all products in cart
    function storeCartCheckout(Request $request){
        $paymethod=$request->pay_method;
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
        if($paymethod=='cod') {
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
    
}
