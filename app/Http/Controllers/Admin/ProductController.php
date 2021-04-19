<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Material;
use App\Models\Pricelist;
use App\Models\Productimage;

class ProductController extends Controller
{
    // product list
    function product(){
        $products = Product::latest()->get();
        return view('admin.product.product_list',['products'=>$products]);
    }
    // create view
    function productCreate(){
        $category = Category::all();
        $material = Material::all();
        return view('admin.product.product_create',['category'=>$category, 'material'=>$material]);
    }
    // upload product
    function doProductCreate(Request $request){
         // product 
        $product = Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'size'=>$request->size,
            'color'=>$request->color,
            'material_id'=>$request->material_id,
            'category_id'=>$request->category_id,
        ]);
        // image 1
        $image_1 = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image_1')->getClientOriginalExtension();
        $path_1 = Storage::putFileAs('image', $request->file('image_1'), $image_1);
        // productimage
        $product_image = Productimage::create([
            'product_id'=>$product->product_id,
            'image'=>$path_1,
        ]);
        // image 2
        if($request->image_2 != '') {
            $image_2 = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image_2')->getClientOriginalExtension();
            $path_2 = Storage::putFileAs('image', $request->file('image_2'), $image_2);
            // productimage
            $product_image = Productimage::create([
                'product_id'=>$product->product_id,
                'image'=>$path_2,
            ]);
        }
        // image 3
        if($request->image_3 != '') {
            $image_3 = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image_3')->getClientOriginalExtension();
            $path_3 = Storage::putFileAs('image', $request->file('image_3'), $image_3);
            // productimage
            $product_image = Productimage::create([
                'product_id'=>$product->product_id,
                'image'=>$path_3,
            ]);
        }
        // image 4
        if($request->image_4 != '') {
            $image_4 = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image_4')->getClientOriginalExtension();
            $path_4 = Storage::putFileAs('image', $request->file('image_4'), $image_4); 
            // productimage
            $product_image = Productimage::create([
                'product_id'=>$product->product_id,
                'image'=>$path_4,
            ]);
        }
        return redirect()->route('product')->with('message','Product uploaded successfully!');
    }
    // edit view
    function productEdit($id){
        $category = Category::all();
        $material = Material::all();
        $product =Product::find(decrypt($id));
        return view('admin.product.product_edit',['product'=>$product, 'category'=>$category, 'material'=>$material]);
    }
    // edit product
    function doProductEdit(Request $request, $id){
        $product = Product::find(decrypt($id));
        $product_image = Productimage::find($request->image_id);
        if($request->image!=''){ 
            $deletepath=$product_image->image;
            Storage::delete($deletepath); // delete old image
            $image = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = Storage::putFileAs('image', $request->file('image'), $image);
            $product_image->image=$path;
            $product_image->save();
            }
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->category_id = $request->category_id;
        $product->material_id = $request->material_id;
        $product->save();
        return redirect()->route('product')->with('message', 'product updated!');
    }
    // image list
    function productImageList($id){
        $product_images = Productimage::where('product_id',decrypt($id))->get();
        return view('admin.product.product_image',['product_images'=>$product_images]);
    }
    // edit image
    function editProductImage( Request $request, $id) {
        $product_image = Productimage::find(decrypt($id));
        $deletepath=$product_image->image;
        Storage::delete($deletepath); // delete old image
        $image = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = Storage::putFileAs('image', $request->file('image'), $image);
        $product_image->image=$path;
        $product_image->save();
        return redirect()->back();
    }
    // delete product
    function productDelete($id){
        $product = Product::find(decrypt($id));
        //Storage::delete('image/'.$product->image);
        Storage::delete($product->image);
        Product::find(decrypt($id))->delete();
        return redirect()->route('product')->with('message', 'Product deleted!');
    }
    // add price view
    function productAddPrice($id){
        $product_id =decrypt($id);
        $count=Pricelist::where('product_id',$product_id)->count();
        if($count==0){
            return view('admin.product.product_add_price',['product_id'=>$product_id,'count'=>$count]);
        }else {
            $pricelist=Pricelist::where('product_id',$product_id)->latest()->first();
            return view('admin.product.product_add_price',['product_id'=>$product_id,'pricelist'=>$pricelist,'count'=>$count]);
        }
        
    }
    // do add price
    function doProductAddPrice(Request $request, $id){
        if($request->date_from < $request->date_to){
        $pricelist = Pricelist::create([
            'product_id'=>decrypt($id),
            'date_from'=>$request->date_from,
            'date_to'=>$request->date_to,
            'price'=>$request->price,
        ]);
            $product=Product::find(decrypt($id));
            $product->status=1;
            $product->save();
        return redirect()->route('product')->with('message','Price list added successfully!');
        }
        return redirect()->route('product.add.price',['id'=>$id])->with('message','Please confirm To-Date greater than From-Date');
    }
    // price list view
    function productPricelist($id){
        $product_id = decrypt($id);
        $pricelist = Pricelist::where('product_id',$product_id)->get();
        return view('admin.product.product_pricelist',['product_id'=>$product_id, 'pricelist'=>$pricelist]);
    }
    // delete price list
    function productPricelistDelete($id){
        $id=decrypt($id);
        $pricelist=Pricelist::find($id)->first();
        $product_id=$pricelist->product_id;
        Pricelist::find($id)->delete();
        $count=Pricelist::where('product_id',$product_id)->count();
        if($count!=0){
            return redirect()->route('product')->with('message','Price deleted!');
        }else {
            $product=Product::find($product_id);
            $product->status=0;
            $product->save();
            return redirect()->route('product')->with('message','Price deleted!');
        }
       
    }
}
