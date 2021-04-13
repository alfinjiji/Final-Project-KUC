<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class RegisterController extends Controller
{
    function userRegister(Request $request){
        
        $users = Customer::where('email', $request->email)->first();
        if ($users === null) {
          // User does not exist
          Customer::create([
            'first_name'=>$request->fname,
            'last_name'=>$request->lname,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>Hash::make($request->password),
          ]);
           //return redirect()->route('home');
          return response()->json(['success'=>'User registration successfull']);
        } else {
          // User exits
          return response()->json(['error'=>'Email already exist']);
        } 

    }
}
