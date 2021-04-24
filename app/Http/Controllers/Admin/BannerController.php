<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use App\Models\Product;
class BannerController
{
    function show(){   
        $products=Product::all();
        $banners=Banner::latest()->get();
        return view('admin.banner.view',compact('banners'));
    }

    
    function edit($id){
         $id=decrypt($id);
         $banner=Banner::find($id);
        return view('admin.banner.edit',compact('banner'));
    }


    public function store(Request $request) {
        $request->validate([
            'image' => 'required',
        ]);
        $imageName = time().rand().'.'.$request->image->getClientOriginalExtension();
        $path = Storage::putFileAs('image',$request->file('image'), $imageName);
        Banner::create([
            'banner_name'=> $request->bannername,
            'url'=> $request->url,
            'image'=> $imageName,
            'date_from'=> $request->fromdate,
            'date_to'=> $request->duedate,

        ]);
        return redirect()->route('banner.show');
    }


    public function update($id ,Request $request){
        $id=decrypt($id);
        $banner=Banner::find($id);
        if($request->image!=''){ 
            $deletepath=$banner->image;
            Storage::delete('/image/'.$deletepath); // delete old image
            $imageName = time().rand().'.'.$request->image->getClientOriginalExtension();
            $path = Storage::putFileAs('image',$request->file('image'), $imageName);
            $banner->image=$imageName;
        }
        $banner->banner_name= $request->bannername;
        $banner->url=$request->url;
        $banner->date_from=$request->fromdate;
        $banner->date_to=$request->duedate;
        $banner->save();
        return redirect()->route('banner.show');
    }

    
    public function destroy($id){
        $id=decrypt($id);
        //Banner::find($id)->delete();
        $banner=Banner::find($id);
        $path=$banner->image;
        Storage::delete('/image/'.$path);
        Banner::find($id)->delete();
        return redirect()->route('banner.show');
    }
}
