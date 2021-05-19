<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Models\Cart;
use App\Mail\ResetPassword;
use Session;

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

    //fogot password
    function sendMail(Request $request){
        $email=$request->email;
        $count=Customer::where('email',$email)->count();
        $user=Customer::where('email',$email)->first();
        $url='http://localhost/Project/showresetpassword/'.encrypt($user->customer_id);
        if($count==0){
            return response()->json(['error'=>0]);
        }else{
            $details=[ 
               'url' =>$url,
               'id'=>$user->customer_id
           ];
          Mail::to($request->email)->send(new ResetPassword($details));
          return response()->json(['success'=>1]);
        }
    }
    function showResetPassword($id){
        $id=decrypt($id);
        return view('user.reset_password',compact('id'));
    }
    function setPassword(Request $request){
        $id=$request->id;
        $customer=Customer::find($id);
        $customer->password=Hash::make($request->password);
        $customer->save();
        return redirect('/');
    }
}
