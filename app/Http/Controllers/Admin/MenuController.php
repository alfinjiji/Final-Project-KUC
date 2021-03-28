<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    function menu(){
        $menu = Menu::all();
        return view('admin.menu',['menu'=>$menu]);
    }
    function menuCreate(){
        return view('admin.menu_create');
    }
    function doMenuCreate(Request $request){
        $Menu = Menu::create([
            'menu_name'=>$request->menu_name,
        ]);
        return redirect()->route('menu.create')->with('message', 'Menu added successfully!');
    }
    function menuEdit($id){
        $menu = Menu::find($id);
        return view('admin.menu_edit',['menu'=>$menu]);
    }
    function doMenuEdit(Request $request, $id){
        $menu = Menu::find($id);
        $menu->menu_name = $request->menu_name;
        $menu->save();
        return redirect()->route('menu')->with('message', 'Menu updated!');
    }
    function menuDelete($id){
        Menu::find($id)->delete();
        return redirect()->route('menu')->with('message', 'Menu deleted!');
    }
}
