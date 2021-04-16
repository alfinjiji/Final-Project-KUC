<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class WishlistController extends Controller
{
    // user wishlist
    function userWishlist($id){
        $id=decrypt($id);
        $wishlist=Favorite::where('customer_id',$id)->get();
        return view('user.wishlist',['wishlist'=>$wishlist]);
    }
    // clear all product  wishlist
    function clearWishlist($id){
        $id=decrypt($id);
        $wishlist=Favorite::where('customer_id',$id)->delete();
        return redirect('/');
    }
    // remove product from wishlist page
    function deleteSingleWishlist($pid,$cid){
        $pid=decrypt($pid);
        Favorite::where('product_id',$pid)->delete();
        $cid=decrypt($cid);
        $wishlist=Favorite::where('customer_id',$cid)->get();
        return view('user.wishlist',['wishlist'=>$wishlist]);
    }
    // add to wishlist
    function addWishlist(Request $request){
        $customer = Auth::guard('customer')->user();
        $id = $request->product_id;
            $wishlist = Favorite::select('*')
                                ->where('product_id', $id)
                                ->where('customer_id',$customer->customer_id)
                                ->first();
            if($wishlist == '') {
                Favorite::create([
                    'product_id'=>$id,
                    'customer_id' => $customer->customer_id,
                ]);
                return response()->json(['success'=>1]);
            } else {
                Favorite::select('*')
                        ->where('product_id', $id)
                        ->where('customer_id',$customer->customer_id)
                        ->delete();
                return response()->json(['error'=>0]);
            }
    }
}
