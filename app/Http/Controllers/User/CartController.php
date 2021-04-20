<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Cart;

class CartController extends Controller
{
    function viewCart()
    {
        if(Auth::guard('customer')->check())
      {
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $cart=Cart::where('customer_id',$customer_id)->get();
        return view('user.cart',['cart'=>$cart]);
      }else{
        return redirect()->back();
      }
    }
    function addAllToCart(){
      if(Auth::guard('customer')->check())
      {
        $customer_id=Auth::guard('customer')->user()->customer_id;
        $products=Favorite::where('customer_id',$customer_id)->get();
        foreach($products as $product)
        {
            Cart::create([
                'product_id'=>$product->product_id,
                'customer_id' => $product->customer_id,
            ]);
        }
        return redirect()->back();
      }else{
        return redirect()->back();
      }
    }
    function deleteCart($id){
        $id=decrypt($id);
        Cart::find($id)->delete();
       return redirect()->back();
    }
}
