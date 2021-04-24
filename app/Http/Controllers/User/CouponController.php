<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController
{
    // coupon view
    function index(){
        $current_date = date('Y-m-d');
        $coupons = Coupon::whereDate('date_to','>=',$current_date)
                            ->whereDate('date_from','<=',$current_date)
                            ->get();
        return view('user.coupon_list',compact('coupons'));
    }
    // coupon check
    function check(Request $request){
        $current_date = date('Y-m-d');
        $coupon_count = Coupon::where('code',$request->coupon_code)
                        ->whereDate('date_to','>=',$current_date)
                        ->whereDate('date_from','<=',$current_date)
                        ->count();
        if($coupon_count != 0) {
            $coupon = Coupon::where('code',$request->coupon_code)
                        ->whereDate('date_to','>=',$current_date)
                        ->whereDate('date_from','<=',$current_date)
                        ->first();
                $subtotal = $request->subtot;
                if($coupon->type == 1) {
                    $subtotal = $subtotal - ($subtotal * ($coupon->type_value / 100));
                } else {
                    $subtotal = $subtotal - $coupon->type_value;
                }
            return response()->json(['grandtotal'=>$subtotal,'coupon_id'=>$coupon->coupon_id]);
        } else {
            return response()->json(['error'=>0]);
        }
    }

}
