<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){

        $slider = Slider::all();
        return view('admin.sliders.index', compact('slider'));
    }

    public function add(){

        return view('admin.sliders.add');
    }

    public function store(Request $request){

        if($request->hasFile('image')){

            $images = $request->image;
            $ext = $images->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
           $images->move('upload/slider', $imageName);
           $finalName = 'upload/slider/'.$imageName;

           Slider::create([
            'images' => $finalName,
            'status' => $request->status == true?'1':'0',
            'create_at' => Carbon::now(),
           ]);
           return redirect('/admin/sliders')->with('message','Slider added successfully');
        }
    return redirect('/admin/sliders')->with('message','somthing want wrongs');
    }


    public function edit($id){

        $slider = Slider::findOrFail($id);
        return view('admin.sliders.update', compact('slider'));

    }

    public function update(Request $request, $id){


            if($request->hasFile('image')){

                $db_image = Slider::findOrFail($id);

                if(File::exists($db_image->images)){
                    File::delete($db_image->images);
                }

                $images = $request->image;
                $ext = $images->getClientOriginalExtension();
                $imageName = time().'.'.$ext;
                $images->move('upload/slider', $imageName);
                $finalName = 'upload/slider/'.$imageName;

                $db_image->update([

                    'images' => $finalName,
                    'status' => $request->status == true?'1':'0',
                    'create_at' => Carbon::now(),
               ]);

               return redirect('/admin/sliders')->with('message','Slider update successfully');
            }
            return redirect('/admin/sliders')->with('message','You can not select images');

    }

    public function delete($id){

        $db_image = Slider::findOrFail($id);

        if(File::exists($db_image->images)){
            File::delete($db_image->images);
        }
        $db_image->delete();
        return redirect('/admin/sliders')->with('message','Slider deleted successfully');
    }
}
