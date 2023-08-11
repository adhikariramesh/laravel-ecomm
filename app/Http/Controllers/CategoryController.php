<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
   public function index(){

    $category = category::all();

    return view('admin.category.index', compact('category'));
   }

   public function categoryForm(){

    return view('admin.category.category');

   }

   public function store(Request $request){

    $request->validate([
        'name' => 'required|string',
        'slug' => 'required|string',
        'description' => 'required|string',
        'meta_title' => 'required|string',
        'meta_keyword' => 'required|string',
        // 'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    // images
    if($request->has('image')){

       $ext = $request->file('image')->getClientOriginalExtension();
       $imageName = time().'.'.$ext;
       $imagesPath = 'upload/category/'.$imageName;
       $request->image->move('upload/category/', $imageName);

    }

        $category = new category;

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->images = $imagesPath;
        $category->save();

        return redirect('/admin/add/category')->with('message','Category added successfully');

   }

   public function delete($id){

    $category = category::findOrFail($id);
    if(File::exists($category->images)){
        File::delete($category->images);
    }
    $category->delete();
    return redirect('/admin/category')->with('message','category deleted successfully');

   }

   public function edit($id){

    $category = category::findOrFail($id);
    return view('admin.category.update', compact('category'));

   }


   public function update(Request $request, $id){

    $category = category::findOrFail($id);

    if($request->has('image')){

        if(File::exists($category->images)){
            File::delete($category->images);
        }

        $ext = $request->file('image')->getClientOriginalExtension();
        $imageName = time().'.'.$ext;
        $imagesPath = 'upload/category/'.$imageName;
        $request->image->move('upload/category/', $imageName);
        $category->images = $imagesPath;

     }


    $category->name = $request->name;
    $category->slug = $request->slug;
    $category->description = $request->description;
    $category->meta_title = $request->meta_title;
    $category->meta_keyword = $request->meta_keyword;

    $category->update();

    return redirect('/admin/category')->with('message', 'Category update successfully');

   }

}
