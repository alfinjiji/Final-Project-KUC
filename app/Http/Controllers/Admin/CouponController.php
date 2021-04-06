<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
class CouponController extends Controller
{
    function coupon()
    {
         $coupon=Coupon::latest()->get();
        return view('admin.coupon.coupon',['Coupon'=>$coupon]);

    }
    function couponAdd(Request $request)
    {
      Coupon::create(['name'=>$request->name,'code'=>$request->code,'date_from'=>$request->fromdate,'date_to'=>$request->duedate,'type'=>$request->type,'type_value'=>$request->value]);
      return redirect()->route('coupon');
    }
    function couponDelete($id)
    {
        Coupon::find($id)->delete();
        return redirect()->route('coupon');
    }
}
