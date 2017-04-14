<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use App\Product;
use App\Maker;
use App\ModelCar;
use App\Product_model_year;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
    }

    public function resultSearch(Request $request){
       
        $id_maker = $request->id_maker;
        $id_model = $request->id_model;
        $id_year = $request->id_year;

        $search = new \stdClass();
        $search->id_maker = $id_maker;
        $search->id_model = $id_model;
        $search->id_year = $id_year;

        $maker = Maker::find($id_maker);
        $search->maker = $maker->name;

        if($id_model!=0){
            $model = ModelCar::find($id_model);
            $search->model = $model->name;
        }else{
            $search->model = "";
        }

        $search->year = $id_year;

        if($id_model==0 && $id_year==0){

            $products = DB::table('products')
            ->join('product_model_year', 'products.id', '=', 'product_model_year.id_product') 
            ->where('product_model_year.id_maker','=', $id_maker)            
            ->where('product_model_year.status','=', 1)       
            ->paginate(12);    
                    
        }
        if($id_model!=0 && $id_year==0){

            $products = DB::table('products')
            ->join('product_model_year', 'products.id', '=', 'product_model_year.id_product') 
            ->where('product_model_year.id_maker','=', $id_maker)  
            ->where('product_model_year.id_model','=', $id_model)            
            ->where('product_model_year.status','=', 1)       
            ->paginate(12); 
        }
        if($id_model==0 && $id_year!=0){

             $products = DB::table('products')
            ->join('product_model_year', 'products.id', '=', 'product_model_year.id_product') 
            ->where('product_model_year.id_maker','=', $id_maker)  
            ->where('product_model_year.year','=', $id_year)            
            ->where('product_model_year.status','=', 1)       
            ->paginate(12);
        }
        if($id_model!=0 && $id_year!=0){

             $products = DB::table('products')
            ->join('product_model_year', 'products.id', '=', 'product_model_year.id_product') 
            ->where('product_model_year.id_maker','=', $id_maker)
            ->where('product_model_year.id_model','=', $id_model)    
            ->where('product_model_year.year','=', $id_year)            
            ->where('product_model_year.status','=', 1)       
            ->paginate(12);
        }

        $makers = Maker::where('status','=','1')->orderBy('name','asc')->pluck('name','id');
        
        $models = ModelCar::where('status','=','1')->orderBy('name','asc')->pluck('name','id');
        
        $years = Product_model_year::distinct()->select('year')->groupBy('year')->pluck('year','year');

        $productMY = new Product_model_year;

        return view('website.list')->with(compact('products', 'makers', 'models', 'years', 'search', 'productMY'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
