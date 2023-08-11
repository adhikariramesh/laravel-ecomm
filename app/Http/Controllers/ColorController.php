<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index(){

        $color = Color::all();
        return view('admin.colors.index', compact('color'));
    }

    public function add(){

        return view('admin.colors.add');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        $color = new Color;

        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status == true?"1":"0";
        $color->save();
        return redirect('/admin/color')->with('message','color added successfully');


    }

    public function delete($id){

        Color::findOrFail($id)->delete();
        return redirect('/admin/color')->with('message','color deleted successfully');
    }

    public function edit($id){

        $color = Color::findOrFail($id);
        return view('admin.colors.update', compact('color'));
    }

    public function update(Request $request, $id){

       $color = Color::findOrFail($id);
       $color->name = $request->name;
       $color->code = $request->code;
       $color->status = $request->status == true?"1":"0";
       $color->update();
       return redirect('/admin/color')->with('message','color update successfully');
    }
}
