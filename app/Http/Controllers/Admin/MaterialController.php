<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Crypt;

class MaterialController extends Controller
{
    function show(){
        $materials = Material::latest()->get();
        return view('admin.material.list',compact('materials'));
    } 
    function create(){
        return view('admin.material.create');
    }
    function store(Request $request){
        $material = Material::create([
            'material_name'=>$request->material_name,
        ]);
        return redirect()->route('material.show')->with('message', 'Material added successfully!');
    }
    function edit($id){
        $material = Material::find(decrypt($id));
        return view('admin.material.edit',compact('material'));
    }
    function update(Request $request, $id){
        $material = Material::find(decrypt($id));
        $material->material_name = $request->material_name;
        $material->save();
        return redirect()->route('material.show')->with('message', 'Material updated!');
    }
    function destroy($id){
        Material::find(decrypt($id))->delete();
        return redirect()->route('material.show')->with('message', 'Material deleted!');
    }
}
