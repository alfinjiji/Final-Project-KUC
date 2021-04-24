<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Cart;

class CartController 
{
  // cart view
  function index(){
    if(Auth::guard('customer')->check()){
      $customer_id=Auth::guard('customer')->user()->customer_id;
      $carts=Cart::where('customer_id',$customer_id)->get();
      $count=Cart::where('customer_id',$customer_id)->count();
      return view('user.cart',compact('carts','count'));
    } else {
      return redirect()->back();
    }
  }
  // add to cart
  function store(Request $request){
    $customer_id=Auth::guard('customer')->user()->customer_id;
    $count=Cart::where('product_id',$request->product_id)->count();
    if($count==0){
      Cart::create([
        'product_id'=>$request->product_id,
        'customer_id' =>$customer_id,
        'quantity'=>1,
      ]);
      return response()->json(['success'=>1]);
    } else {
      return response()->json(['error'=>0]);
    }
  }
  // add all to cart (in wishlist)
  function storeAll(){
    if(Auth::guard('customer')->check()){
      $customer_id=Auth::guard('customer')->user()->customer_id;
      $products=Favorite::where('customer_id',$customer_id)->get();
      foreach($products as $product){
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
    } else { 
      return redirect()->back();
    }
  }
  // delete single product from cart
  function destroy($id){
    $id=decrypt($id);
    Cart::find($id)->delete();
    return redirect()->back();
  }
  // delete all product fromcart
  function clear(){
    $id=Auth::guard('customer')->user()->customer_id;
    Cart::where('customer_id',$id)->delete();
    return redirect()->back();
  }
  // update quantity in cart
  function update(Request $request){
    $cart = Cart::find($request->cart);
    $cart->quantity = $request->quantity;
    $cart->save();
  }
}

