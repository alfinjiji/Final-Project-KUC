<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
class CategoryController 
{
    function show(){
        $categorys=Category::latest()->get();
        return view('admin.category.view',compact('categorys'));

       // return view('admin.category');
    }

    function create(){
        return view('admin.category.create');
    }

    function edit($id){    
        $id=decrypt($id);
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    function store(Request $request ){
        Category::create([
            'category_name' => $request->category,
            'status' => '1',
        ]);
        return redirect()->route('category.show');
    }

     function update($id ,Request $request){
        $category = Category::find($id);

        $category->category_name = $request->edit;
        
        $category->save();
        return redirect()->route('category.show')->with('message','Updated Successfuly');
     }

     function destroy($id){
        $id=decrypt($id);
        Category::find($id)->delete();
        return redirect()->route('category.show');
     }
}
