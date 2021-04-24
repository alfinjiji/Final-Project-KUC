<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Favorite;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
class CustomerController
{
    function show(){
        $customers =Customer::all();
        return view('admin.customer.list',compact('customers'));
    
    }
    function showAddress($id) {  
        $id=decrypt($id);
       $addresses=CustomerAddress::where('customer_id','=',$id)->get();
        return view('admin.customer.address',compact('addresses'));
    }
    function showWishlist($id){
        $id=decrypt($id);
        $wishlists=Favorite::where('customer_id',$id)->get();
       
        return view('admin.customer.wishlist',compact('wishlists'));
    }
    function showOrder($id){  
         $id=decrypt($id);
       $orders=Order::where('customer_id','=',$id)->get();

        return view('admin.customer.order',compact('orders'));
    }
    // load money to wallet
    function storeWallet(Request $request){
        $customer = Customer::find($request->customer_id);
        Wallet::create([
            'customer_id'=>$customer->customer_id,
            'amount'=>$request->amount,
            'flag'=>0,
        ]);
        $customer->wallet_amount = $customer->wallet_amount + $request->amount;
        $customer->save();
        return redirect()->route('customer.show');
    }

    function demo()
    {
        return view('user.homepage');
    }
}
