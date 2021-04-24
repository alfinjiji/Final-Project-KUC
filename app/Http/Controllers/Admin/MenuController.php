<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Crypt;

class MenuController
{
    function show(){
        $menus = Menu::latest()->get();
        return view('admin.menu.list',compact('menus'));
    }
    function create(){
        return view('admin.menu.create');
    }
    function store(Request $request){
        $Menu = Menu::create([
            'menu_name'=>$request->menu_name,
        ]);
        return redirect()->route('menu.show')->with('message', 'Menu added successfully!');
    }
    function edit($id){
        $menu = Menu::find(decrypt($id));
        return view('admin.menu.edit',compact('menu'));
    }
    function update(Request $request, $id){
        $menu = Menu::find(decrypt($id));
        $menu->menu_name = $request->menu_name;
        $menu->save();
        return redirect()->route('menu.show')->with('message', 'Menu updated!');
    }
    function destroy($id){
        Menu::find(decrypt($id))->delete();
        return redirect()->route('menu.show')->with('message', 'Menu deleted!');
    }
}
