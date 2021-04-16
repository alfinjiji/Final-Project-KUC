<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // login
    function userLogin(Request $request){
        $input = ['email'=>request('email'),'password'=>request('pwd')];
        if(Auth::guard('customer')->attempt($input)){
           // login success
            return response()->json(['success'=>1]);
        } else {  
           // login failed
            return response()->json(['error'=>0]);
         } 
    }
    // logout
    public function userLogout() {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
    // change password
    function changePassword(Request $request){
        $customer = Auth::guard('customer')->user();
        if(!Hash::check($request->old_password, $customer->password)){
            // password not match
            return response()->json(['error'=>0]);
        } else {
            // password match
            $customer->password = Hash::make($request->new_password);
            $customer->save();
            return response()->json(['success'=>1]);
        }
    }
}
