<?php

namespace App\Http\Controllers\User;
use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function home(){
        return view('user.homepage');
    }
    function cart(){
        return view('user.cart');
    }
    function productList(){
        $product = Product::where('status',1)->get();
        return view('user.product-list',['product'=>$product]);
    }
    function profile(){
        return view('user.profile');
    }
    function updateProfile(Request $request, $id){
        $id = decrypt($id);
        $customer = Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->save();
        return redirect()->route('profile')->with('message', 'Profile updated successfully!');
    }
    // reset password
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
    function address(){
        return view('user.address');
    }
    function search(){
        return view('user.search-result');
    }
    function singleProduct(){
        return view('user.single-product');
    }
    function userWishlist($id){
        $id=decrypt($id);
        $wishlist=Favorite::where('customer_id',$id)->get();
        return view('user.wishlist',['wishlist'=>$wishlist]);
    }
    function userLogin(Request $request){
        $input = ['email'=>request('email'),'password'=>request('pwd')];

        if(Auth::guard('customer')->attempt($input))
        {
           // return redirect()->route('home');
            return response()->json(['success'=>1]);
        } 
        else
         {  
           // return redirect()->route('home');
            return response()->json(['error'=>0]);
         } 

    }
    public function userLogout() 
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }

    function clearWishlist($id){
        $id=decrypt($id);
        $wishlist=Favorite::where('customer_id',$id)->delete();
        return redirect('/');
    }
    function deleteSinglewishlist($pid,$cid){
        $pid=decrypt($pid);
        Favorite::where('product_id',$pid)->delete();
        $cid=decrypt($cid);
        $wishlist=Favorite::where('customer_id',$cid)->get();
        return view('user.wishlist',['wishlist'=>$wishlist]);
    }
    
    //show men product
    function showMenProduct(){
        $category=Category::where('category_name','men')->first();
        $product = Product::select('*')
                        ->where('category_id',$category->category_id,)
                        ->where('status',1)
                        ->get();
        return view('user.product-list',['product'=>$product]);
    }
    //show women product
    function showWomenProduct(){
        $category=Category::where('category_name','women')->first();
        $product = Product::select('*')
                        ->where('category_id',$category->category_id,)
                        ->where('status',1)
                        ->get();
        return view('user.product-list',['product'=>$product]);
    }
}
