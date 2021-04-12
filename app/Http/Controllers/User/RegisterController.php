<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class RegisterController extends Controller
{
    function userRegister(Request $request){
        Customer::create([
            'first_name'=>$request->fname,
            'last_name'=>$request->lname,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('home');
    }
}
