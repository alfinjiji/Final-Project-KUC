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
        $count=Cart::where('customer_id',$customer_id)->count();
        return view('user.cart',['cart'=>$cart,'count'=>$count]);
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
          $count=Cart::where('customer_id',$customer_id)
                       ->where('product_id',$product->product_id)->count();
          if($count==0){
                  Cart::create([
                  'product_id'=>$product->product_id,
                  'customer_id' => $product->customer_id,
                  'quantity' => 1,
                   ]);
          }
        }
        return redirect()->route('cart');
      }else{
        return redirect()->back();
      }
    }
    function deleteCart($id){
        $id=decrypt($id);
        Cart::find($id)->delete();
       return redirect()->back();
    }

    function addtoCart(Request $request){
      $customer_id=Auth::guard('customer')->user()->customer_id;
      $count=Cart::where('product_id',$request->product_id)->count();
     if($count==0){
          Cart::create([
                'product_id'=>$request->product_id,
                'customer_id' =>$customer_id,
                'quantity'=>1,
          ]);
        return response()->json(['success'=>1]);
      }else{
        return response()->json(['error'=>0]);
      }
    }
    
    function clearCart(){
      $id=Auth::guard('customer')->user()->customer_id;
      Cart::where('customer_id',$id)->delete();
     return redirect()->back();
  }
    function quantityUpdate(Request $request){
      $cart = Cart::find($request->cart);

        $cart->quantity = $request->quantity;
        
        $cart->save();
    }

}
