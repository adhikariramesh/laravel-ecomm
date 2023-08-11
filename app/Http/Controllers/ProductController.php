<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\category;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
   public function index(){

    $product = Product::all();

    return view('admin.products.index', compact('product'));
   }

   public function add(){

    $categories = category::all();
    $brands = Brand::all();
    $colors = Color::all();

    return view('admin.products.add', compact('categories','brands','colors'));
   }

   public function store(Request $request){

        $request->validate([

            'category_id'=> 'required',
            'name'=> 'required|string',
            'slug'=> 'required|string',
            'brand'=> 'required|string',
            'original_price'=> 'required',
            'selling_price'=> 'required',
            'quantity'=> 'required',
            'meta_title'=> 'required|string',
            'meta_kayword' => 'required|string',

        ]);


            $categories = category::findOrFail($request->category_id);

            $product =$categories->products()->create([

                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'brand' => $request->brand,
                'small_description' => $request->small_desc,
                'description' => $request->desc,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'quantity' => $request->quantity,
                'tranding' => $request->tranding == true?'1':'0',
                'status' => $request->status == true?'1':'0',
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_kayword,
                'meta_description' => $request->meta_desc,
                'created_at' => Carbon::now(),

            ]);

            $i = 1;
            if($request->hasFile('image')){

                foreach ($request->file('image') as $imageFile) {
                    $uploadPath = 'upload/product';
                    $extention = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagePath = $uploadPath.'/'.$fileName;

                    $product->productImages()->create([
                        'Product_id' =>  $product->id,
                        'images' => $finalImagePath,
                        'created_at' => Carbon::now(),
                    ]);
                }

            }

            if($request->productColor){

                foreach($request->productColor as $key => $color){

                    $product->productcolors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorQuantity[$key] ?? 0,
                        'created_at' => Carbon::now(),
                    ]);
                }
            }
            else{
                return redirect('/admin/add/products')->with('message', 'please select images');
            }

        return redirect('/admin/products')->with('message','Product added sucessfully');
        }


        public function edit($id){

            $product = Product::findOrFail($id);
            $categories = category::all();
            $brands = Brand::all();
            $product_colors = $product->productcolors()->pluck('color_id')->toArray();
            $colors = Color::whereNotIn('id', $product_colors)->get();
            return view('admin.products.update', compact('product','categories','brands','colors'));
        }

        public function deleteImage($id){
            $image = ProductImage::findOrFail($id);
            if(File::exists($image->images)){
                File::delete($image->images);
            }
            $image->delete();
            return redirect()->back()->with('message','Images deleted successfully');
        }


        public function updateColorQuantity(Request $request){

            // return $request->product_id;

            $productColor = Product::findOrFail($request->product_id)
                             ->productcolors()->where('id',$id);

            $product_colors->update([
                'quantity' => $request->quantity,
            ]);
            return response()->json(['message' => 'Product color quantity update successfully']);
        }


        public function update(Request $request,$id){

            $request->validate([

                'category_id'=> 'required',
                'name'=> 'required|string',
                'slug'=> 'required|string',
                'brand'=> 'required|string',
                'original_price'=> 'required',
                'selling_price'=> 'required',
                'quantity'=> 'required',
                'meta_title'=> 'required|string',
                'meta_kayword' => 'required|string',

            ]);


                $product = category::findOrFail($request->category_id)
                            ->products()->where('id',$id)->first();

                if($product){

                         $product->update([

                                'category_id' => $request->category_id,
                                'name' => $request->name,
                                'slug' => $request->slug,
                                'brand' => $request->brand,
                                'small_description' => $request->small_desc,
                                'description' => $request->desc,
                                'original_price' => $request->original_price,
                                'selling_price' => $request->selling_price,
                                'quantity' => $request->quantity,
                                'tranding' => $request->tranding == true?'1':'0',
                                'status' => $request->status == true?'1':'0',
                                'meta_title' => $request->meta_title,
                                'meta_keyword' => $request->meta_kayword,
                                'meta_description' => $request->meta_desc,
                                'updated_at' => Carbon::now(),

                        ]);
                 }
                else{

                    $category = category::findOrFail($request->category_id);
                    $product = Product::findOrFail($id);
                    if($category){
                        $product->update([

                            'category_id' => $category->id,
                            'updated_at' => Carbon::now(),

                        ]);
                        return redirect('/admin/products')->with('message','Category update sucessfully');
                    }
                    return redirect('/admin/products')->with('message','Category not found');
                }

                $i = 1;
                if($request->hasFile('image')){

                    foreach($request->file('image') as $imagesFile){

                        $ext = $imagesFile->getClientOriginalExtension();
                        $imageName = time().$i++.'.'.$ext;
                        $imagesFile->move('upload/product',$imageName);
                        $finalImagePath = 'upload/product/'.$imageName;

                        $product->productImages()->create([
                            'product_id' => $product->id,
                            'images' => $finalImagePath,
                            'created_at' => Carbon::now(),
                        ]);
                    }
                }

                if($request->productColor){

                    foreach($request->productColor as $key => $colors){

                        $product->productcolors()->create([
                            'product_id' => $product->id,
                            'color_id' => $colors,
                            'quantity' => $request->colorQuantity[$key] ?? 0,
                            'created_at' => Carbon::now(),
                        ]);
                    }
                }

                return redirect('/admin/products')->with('message','Product update successfully');
        }


        public function delete($id){

            $product = Product::findOrFail($id);
            $images = ProductImage::where('product_id',$product->id)->get();
            $colors = ProductColor::where('product_id',$product->id)->get();

           if($images){

                foreach($images as $image){

                    if(File::exists($image->images)){

                        File::delete($image->images);;
                    }

                    $image->delete();
                }
           }

           if($colors){

                foreach($colors as $color){
                    $color->delete();
                }
           }
           $product->delete();
           return redirect('/admin/products')->with('message','Product delete successfully');
        }

   }

