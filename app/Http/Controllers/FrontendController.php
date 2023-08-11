<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
   public function index(){

    $category = category::all();
    $banner = Slider::where('status','0')->get();
    return view('frontend.index',compact('category','banner'));

   }


   public function collactions($id){

        $category = category::all();
        $collaction  = category::findOrFail($id)->products()->get();

        return view('frontend.collactions.product', compact('category','collaction'));
   }


   public function singleProduct($id){

        $product = Product::findOrFail($id);
        return view('frontend.collactions.singleProduct', compact('product'));

   }

   public function checkout(Request $request, $id){

    $product = Product::findOrFail($id);
    $quantity = $request->quantity;
    return view('frontend.checkout', compact('product','quantity'));

   }


   public function addtocart(Request $request){

    return ramesh;
    die;

    $prod_id = $request->input('product_id');
    $quantity = $request->input('quantity');

    if(Cookie::get('shopping_cart'))
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
    }
    else
    {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');
    $prod_id_is_there = $prod_id;

    if(in_array($prod_id_is_there, $item_id_list))
    {
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]["item_id"] == $prod_id)
            {
                $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
            }
        }
    }
    else
    {
        $products = Product::find($prod_id);
        $prod_name = $products->title;
        $prod_image = $products->images;
        $priceval = $products->price;

        if($products)
        {
            $item_array = array(
                'item_id' => $prod_id,
                'item_name' => $prod_name,
                'item_quantity' => $quantity,
                'item_price' => $priceval,
                'item_image' => $prod_image
            );
            $cart_data[] = $item_array;

            $item_data = json_encode($cart_data);
            $minutes = 60;
            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
            return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
        }
    }
}

}
