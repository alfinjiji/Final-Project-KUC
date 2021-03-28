<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    function CategoryView()
    {
        $category=Category::all();
        return view('admin.category',['cat'=>$category]);

       // return view('admin.category');
    }
    function CategoryCreate()
    {
        return view('admin.category_create');
    }
    function CategoryEdit($id)
    {    
        
        $cat=Category::find($id);
       //$name= $cat->category_name;
        return view('admin.category_edit',['cat'=>$cat]);
    }
    function CategoryAdd(Request $request )
    {
        Category::create([
            'category_name' => $request->category,
            'status' => '1',
        ]);
        return redirect()->route('category.create')->with('message','Success');
    }
     function CategoryUpdate($id ,Request $request){
        $cat = Category::find($id);

        $cat->category_name = $request->edit;
        
        $cat->save();
        return redirect()->route('category')->with('message','Updated Successfuly');
     }
     function CategoryDelete($id)
     {
        Category::find($id)->delete();
        return redirect()->route('category')->with('message','delete Successfuly');
     }
}
