<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Crypt;

class MaterialController extends Controller
{
    function material(){
        $material = Material::latest()->get();
        return view('admin.material.material',['material'=>$material]);
    } 
    function materialCreate(){
        return view('admin.material.material_create');
    }
    function doMaterialCreate(Request $request){
        $material = Material::create([
            'material_name'=>$request->material_name,
        ]);
        return redirect()->route('material')->with('message', 'Material added successfully!');
    }
    function materialEdit($id){
        $material = Material::find(decrypt($id));
        return view('admin.material.material_edit',['material'=>$material]);
    }
    function domaterialEdit(Request $request, $id){
        $material = Material::find(decrypt($id));
        $material->material_name = $request->material_name;
        $material->save();
        return redirect()->route('material')->with('message', 'Material updated!');
    }
    function materialDelete($id){
        Material::find(decrypt($id))->delete();
        return redirect()->route('material')->with('message', 'Material deleted!');
    }
}
