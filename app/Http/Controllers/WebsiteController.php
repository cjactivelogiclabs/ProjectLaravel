<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countrie;
use App\State;
use App\Product;
use App\Maker;
use App\ModelCar;
use App\Product_model_year;
use DB;

class WebsiteController extends Controller
{

    public function stateCountries(Request $request, $id)
    {
        if($request->ajax()){
            $states = DB::table('states')->where('id_countrie',$id)->get();
            return response()->json($states);
        }
    }  


   public function productDetail($id)
    {
       $product = Product::find($id);
       $product_maker = Product_model_year::select('id_maker')->where('id_product',$id)->first();
       $maker = Maker::find($product_maker->id_maker);
       $product_models = Product_model_year::where('id_product',$id)->get(); 
       //dd($product_models);
       return view("website.product-detail")
       ->with("product",$product) 
       ->with("maker", $maker)
       ->with("list_models",$product_models);
    }
}
