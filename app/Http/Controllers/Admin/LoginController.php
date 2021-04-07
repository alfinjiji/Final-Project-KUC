<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use App\Models\Admin;
//use Session;
//Use Redirect;
class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        
        $input = ['email'=>request('email'),'password'=>request('password')];

        if(auth()->attempt($input)){
            return redirect()->route('dashboard')->with('message','Successfully Logged in');
        }else{
            return redirect()->route('login')->with('error','Invalid Password, Please try to login again');
        }
        
        /*
        $admininfo = Admin::where('email',$request->email)->first();
        if(!$admininfo){
            return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
        }else{
            if(Hash::check($request->password, $admininfo->password))
            {
                //$request->session()->put('admin',$admininfo->admin_id);
                Session::put('admin', ['id' => $admininfo->admin_id, 'name' => $admininfo->name]);
                return redirect('home');
            }
            else{
                return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
            }
        } */
       
    }

    public function logout() 
    {
        //Auth::guard('admin')->logout();
        Auth::logout();
        return redirect('login');
        
        /*
        if (session()->has('admin')){
            session()->pull('admin');
            return redirect('login');
        }
        */
    }
  
}
