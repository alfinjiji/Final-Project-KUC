<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Crypt;

class MenuController extends Controller
{
    function menu(){
        $menu = Menu::latest()->get();
        return view('admin.menu.menu',['menu'=>$menu]);
    }
    function menuCreate(){
        return view('admin.menu.menu_create');
    }
    function doMenuCreate(Request $request){
        $Menu = Menu::create([
            'menu_name'=>$request->menu_name,
        ]);
        return redirect()->route('menu')->with('message', 'Menu added successfully!');
    }
    function menuEdit($id){
        $menu = Menu::find(decrypt($id));
        return view('admin.menu.menu_edit',['menu'=>$menu]);
    }
    function doMenuEdit(Request $request, $id){
        $menu = Menu::find(decrypt($id));
        $menu->menu_name = $request->menu_name;
        $menu->save();
        return redirect()->route('menu')->with('message', 'Menu updated!');
    }
    function menuDelete($id){
        Menu::find(decrypt($id))->delete();
        return redirect()->route('menu')->with('message', 'Menu deleted!');
    }
}
