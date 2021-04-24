<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerAddress;

class AddressController
{
    // create and view address 
    function create(){
        $addresses = CustomerAddress::where('customer_id',Auth::guard('customer')->user()->customer_id)->get();
        return view('user.address', compact('addresses'));
    }
    // store address
    function store(Request $request){
        if(Auth::guard('customer')->check()){
            CustomerAddress::create([
                'customer_id'=>Auth::guard('customer')->user()->customer_id,
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'house_name'=>$request->housename,
                'area'=>$request->area,
                'city'=>$request->city,
                'state'=>$request->state,
                'pincode'=>$request->pincode,
                'landmark'=>$request->landmark,
            ]);
            return redirect()->back()->with('message','Address added successfully!');
        } else {
            return route('/');
        }
    }
    // delete address
    function destroy($id){
        CustomerAddress::find(decrypt($id))->delete();
        return redirect()->back()->with('message2','Address deleted successfully!');
    }
}
