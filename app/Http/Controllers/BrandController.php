<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function show(){

        $brand = Brand::all();
        return view('admin.brands.index', compact('brand'));
    }


    public function add(){

        $category = category::all();
        return view('admin.brands.addBrand', compact('category'));
    }




    // public function store(Request $request)
    // {
    //     Brand::create($request->all());

    //     return response(['success' => 'Employee created successfully.']);
    // }


    public function store(Request $request){

         $request->validate([
            "name" => 'required|string',
            "slug" => 'required|string',
            "category_id" => 'required',
         ]);

         $brand = new Brand;
         $brand->name = $request->name;
         $brand->slug = $request->slug;
         $brand->category_id = $request->category_id;
         $brand->status = $request->status == true?'1':'0';
         $brand->save();

         return redirect('/admin/brand')->with('sessage', 'Brand added successfully');

    }

    public function delete($id){

        Brand::findOrFail($id)->delete();
        return redirect('/admin/brand')->with('message', 'Brand deleted successfully');
    }

    public function edit($id){

        $brand = Brand::findOrFail($id);
        $category = category::all();


        return view('admin.brands.update', compact('brand','category'));
    }


    public function update(Request $request,$id){

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->category_id = $request->category_id;
        $brand->status = $request->status == true?'1':'0';
        $brand->update();
        return redirect('/admin/brand')->with('sessage', 'Brand update successfully');
    }
}
