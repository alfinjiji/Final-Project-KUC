<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
class CategoryController extends Controller
{
    function CategoryView()
    {
        $category=Category::latest()->get();
        return view('admin.category.category',['cat'=>$category]);

       // return view('admin.category');
    }
    function CategoryCreate()
    {
        return view('admin.category.category_create');
    }
    function CategoryEdit($id)
    {    
        $id=decrypt($id);
        $cat=Category::find($id);
        return view('admin.category.category_edit',['cat'=>$cat]);
    }
    function CategoryAdd(Request $request )
    {
        Category::create([
            'category_name' => $request->category,
            'status' => '1',
        ]);
        return redirect()->route('category');
    }
     function CategoryUpdate($id ,Request $request){
        $cat = Category::find($id);

        $cat->category_name = $request->edit;
        
        $cat->save();
        return redirect()->route('category')->with('message','Updated Successfuly');
     }
     function CategoryDelete($id)
     {
        $id=decrypt($id);
        Category::find($id)->delete();
        return redirect()->route('category');
     }
}
