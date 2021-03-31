<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Product;
use App\Models\Material;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pricelist;

class ProductController extends Controller
{
    function product(){
        /* 
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->join('materials', 'products.material_id', '=', 'materials.material_id')
            ->select('products.*', 'categories.category_name', 'materials.material_name')
            ->latest()->get();
        */
        $products = Product::latest()->get();
        return view('admin.product.product',['products'=>$products]);
    }
    function productCreate(){
        $category = Category::all();
        $material = Material::all();
        return view('admin.product.product_create',['category'=>$category, 'material'=>$material]);
    }
    function doProductCreate(Request $request){
        $image = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = Storage::putFileAs('image', $request->file('image'), $image);
        $product = Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'size'=>$request->size,
            'color'=>$request->color,
            'material_id'=>$request->material_id,
            'category_id'=>$request->category_id,
            'image'=>$path,
        ]);
        return redirect()->route('product')->with('message','Product uploaded successfully!');
    }
    function productEdit($id){
        $category = Category::all();
        $material = Material::all();
        $product =Product::find(decrypt($id));
        return view('admin.product.product_edit',['product'=>$product, 'category'=>$category, 'material'=>$material]);
    }
    function doProductEdit(Request $request, $id){
        $product = Product::find(decrypt($id));
        if($request->image!=''){ 
            $deletepath=$product->image;
            Storage::delete($deletepath); // delete old image
            $image = date('Y-m-d-H-i-s-').rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = Storage::putFileAs('image', $request->file('image'), $image);
            $product->image=$path;
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
    function productDelete($id){
        $product = Product::find(decrypt($id));
        //Storage::delete('image/'.$product->image);
        Storage::delete($product->image);
        Product::find(decrypt($id))->delete();
        return redirect()->route('product')->with('message', 'Product deleted!');
    }
    function productAddPrice($id){
        $product_id =decrypt($id);
        return view('admin.product.product_add_price',['product_id'=>$product_id]);
    }
    function doProductAddPrice(Request $request, $id){
        $pricelist = Pricelist::create([
            'product_id'=>decrypt($id),
            'date_from'=>$request->date_from,
            'date_to'=>$request->date_to,
            'price'=>$request->price,
        ]);
        return redirect()->route('product')->with('message','Price list added successfully!');
    }
    function productPricelist($id){
        $product_id = decrypt($id);
        $pricelist = Pricelist::where('product_id',$product_id)->get();
        return view('admin.product.product_pricelist',['product_id'=>$product_id, 'pricelist'=>$pricelist]);
    }
    function productPricelistDelete($id){
        Pricelist::find(decrypt($id))->delete();
        return redirect()->route('product')->with('message','Price deleted!');
    }
}
