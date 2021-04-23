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
class CustomerController extends Controller
{
    function customer()
    {
        $customer =Customer::all();
        return view('admin.customer.customer',['cust'=>$customer]);
    
    }
    function customerAddress($id)
    {  
        $id=decrypt($id);
       $address=CustomerAddress::where('customer_id','=',$id)->get();
        return view('admin.customer.customer_address',['address'=>$address]);
    }
    function wishlist($id)
    {
        $id=decrypt($id);
        $wishlist=Favorite::where('customer_id',$id)->get();
       
        return view('admin.customer.wishlist',['wishlist'=>$wishlist]);
    }
    function customerOrder($id)
    {  
         $id=decrypt($id);
       $order=Order::where('customer_id','=',$id)->get();

        return view('admin.customer.customer_order',['order'=>$order]);
    }
    // load money to wallet
    function loadWallet(Request $request){
        $customer = Customer::find($request->customer_id);
        Wallet::create([
            'customer_id'=>$customer->customer_id,
            'amount'=>$request->amount,
            'flag'=>0,
        ]);
        $customer->wallet_amount = $customer->wallet_amount + $request->amount;
        $customer->save();
        return redirect()->route('customer');
    }

    function demo()
    {
        return view('user.homepage');
    }
}
