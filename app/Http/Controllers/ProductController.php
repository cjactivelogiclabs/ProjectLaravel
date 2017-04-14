<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Storage;
use Session;
use Redirect;
use App\Product;
use App\Maker;
use App\ModelCar;
use App\Product_model_year;
use App\Supplier;
use DB;

class ProductController extends Controller
{
    var $condition_constant = array('0' => 'OE Brand New', '1' => 'OE Refurbish'); 
    var $categoric_constant = array('0' => 'RC', '1' => 'TK', '2' => 'RS');  
    var $emergency_key_constant = array('0' => 'INCLUDED', '1' => 'NOT INCLUDED');  
    var $board_programming_constant = array('0' => 'NO', '1' => 'YES');  

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:150|unique:products',
            'description' => 'required|max:500',
            'price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'stock_minimum' => 'required|numeric',
            'special_price' => 'numeric',
        ],
        [
            'name.required' => 'The name is require',
            'name.max' => 'The name max 150',
            'name.unique' => 'The product name already exists!',
            'description.required' => 'The description is require',
            'description.max' => 'The description max 500',
            'price.numeric' => 'The price is numeric',
            'purchase_price.numeric' => 'The purchase price is numeric',
            'special_price.numeric' => 'The special price is numeric'
       ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $products = DB::table('products')
          ->select('products.*')
          ->where('status','=','1')
          ->orderBy('name')->get();
        return view('dashboard.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $makers = Maker::where('status','=','1')->pluck('name', 'id');
       $models = ModelCar::where('status','=','1')->pluck('name', 'id');
       $years = $this->static_years();
       $suppliers = Supplier::pluck('name', 'id');
       return view("dashboard.product.create")
       ->with("makers",$makers)
       ->with("models",$models)
       ->with("years",$years)
       ->with("suppliers",$suppliers)
       ->with("condition",$this->condition_constant)
       ->with("categoric",$this->categoric_constant)
       ->with("emergency_key",$this->emergency_key_constant)
       ->with("board_programming",$this->board_programming_constant);
    }

    //--------------------------------------------------
    public function static_years(){
        
        $years = array();
        $end_year = date('Y') + 1;
        $start_year = $end_year - 20; 
            for($i= $start_year; $i <= $end_year; $i++){
                $years[$i] = $i;
            }
        return $years;    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
            $ruta = "";
            $idProduct = DB::table('products')->max('id');
            $idProduct = $idProduct+1; 
            $nameFile = 'Prod-'.$idProduct;
           
           
            //$path = $request->file('ImageFile')->storeAs('ProductImages', $nameFile ,'public');  
            //$path = $request->file('ImageFile')->storePubliclyAs('ProductImages',$nameFile, 'local');
            //$url = Storage::url($path); 

            $file = $nameFile.".".$request->file('ImageFile')->getClientOriginalExtension();

            $request->file('ImageFile')->move(base_path() . '/public/storage/ProductImages', $file);  


            $special = 0;
            if($request->get('special')==1)
                $special = 1;
            
            $data = [
                        'SKU'   => $request->get('SKU'),
                        'supplier_sku'   => $request->get('supplier_sku'),
                        'name'   => $request->get('name'),
                        'description' => $request->get('description'),
                        'supplier_id'   => $request->get('supplier'),
                        'condition_o' => $request->get('condition_o'),
                        'categoric' => $request->get('categoric'),
                        'weight' => $request->get('weight'),
                        'location' => $request->get('location'),
                        'type' => $request->get('type'),
                        'fcc_id' => $request->get('fcc_id'),
                        'ic' => $request->get('ic'),
                        'frequency' => $request->get('frequency'),
                        'num_button' => $request->get('num_button'),
                        'reusable' => $request->get('reusable'),
                        'board_programming' => $request->get('board_programming'),
                        'emergency_key' => $request->get('emergency_key'),
                        'battery_part' => $request->get('battery_part'),
                        'stock' => $request->get('stock'),  
                        'stock_minimum' => $request->get('stock_minimum'),  
                        'price' => $request->get('price'),
                        'purchase_price' => $request->get('purchase_price'),
                        'status' => 1, 
                        'image' => 'storage/ProductImages/'.$file,
                        'special' => $special,
                        'special_price' => $request->get('special_price'),
                    ];
           
            if(Product::create($data)){
                $idProduct = DB::table('products')->max('id');
                foreach($request->get('model') as $model){
                    foreach($request->get('year') as $year){
                         $data = [
                            'id_maker'   => $request->get('id_maker'),
                            'id_model'  => $model,
                            'id_product' => $idProduct,
                            'year' => $year,
                            'status' => 1, 
                        ];
                        $msj = "";
                        if(!Product_model_year::create($data)){

                            $msj.= 'Model: '.$model.'-'.$year.'/';
                        }
                      }
                }
                if($msj=="")  
                    Session::flash('message', 'Product '.$request->name.' saved! ');
                else
                    Session::flash('message', 'Product with years '.$request->name.' could not be saved!  ');    
                return Redirect::to('/product');  

            }else{

                Session::flash('message-error', 'Product '.$request->name.' could not be saved! ');
                return Redirect::back();
            }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product = Product::find($id);
       $product_maker = Product_model_year::select('id_maker')->where('id_product',$id)->first();
       $product->id_maker = $product_maker->id_maker; 
       $product_years = Product_model_year::where('id_product',$id)->pluck('year')->toArray(); 
       $product_models = Product_model_year::where('id_product',$id)->pluck('id_model')->toArray(); 
       $makers = Maker::where('status',1)->pluck('name', 'id');
       $models = ModelCar::where('status',1)->pluck('name', 'id');
       $years = $this->static_years();
       return view("dashboard.product.show")
       ->with("product",$product)
       ->with("makers",$makers)
       ->with("models",$models)
       ->with("list_years",$product_years)
       ->with("list_models",$product_models)
       ->with("years",$years)
       ->with("condition",$this->condition_constant)
       ->with("categoric",$this->categoric_constant)
       ->with("emergency_key",$this->emergency_key_constant)
       ->with("board_programming",$this->board_programming_constant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::find($id);
       $product_maker = Product_model_year::select('id_maker')->where('id_product',$id)->first();
       $product->id_maker = $product_maker->id_maker; 
       $product_years = Product_model_year::where('id_product',$id)->pluck('year')->toArray(); 
       $product_models = Product_model_year::where('id_product',$id)->pluck('id_model')->toArray(); 
       $makers = Maker::where('status',1)->pluck('name', 'id');
       $models = ModelCar::where('status',1)->pluck('name', 'id');
       $years = $this->static_years();
       $suppliers = Supplier::pluck('name', 'id');
       return view("dashboard.product.edit")
       ->with("product",$product)
       ->with("makers",$makers)
       ->with("models",$models)
       ->with("suppliers",$suppliers)
       ->with("list_years",$product_years)
       ->with("list_models",$product_models)
       ->with("years",$years)       
       ->with("condition",$this->condition_constant)
       ->with("categoric",$this->categoric_constant)
       ->with("emergency_key",$this->emergency_key_constant)
       ->with("board_programming",$this->board_programming_constant);
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
            $product = Product::find($id);
            $ruta = "";
            $idProduct = $product->id;
            $url =  $product->image;
            $nameFile = 'Prod-'.$idProduct;
            if($request->file('ImageFile')){
                /*$exists = Storage::disk('local')->exists($nameFile);
                if($exists)
                    Storage::delete('file.jpg');
                $path = $request->file('ImageFile')->storePubliclyAs('ProductImages',$nameFile, 'local');  
                $url = Storage::url($path); */

                 unlink(base_path() .'/public/'.$product->image);

                $file = $nameFile.".".$request->file('ImageFile')->getClientOriginalExtension();

                $request->file('ImageFile')->move(base_path() . '/public/storage/ProductImages/', $file); 

                $url = 'storage/ProductImages/'.$file; 
            }
            $special = 0;
            if($request->get('special')==1)
                $special = 1;

            $product->SKU   = $request->get('SKU');
            $product->supplier_sku   = $request->get('supplier_sku');
            $product->name   = $request->get('name');
            $product->description = $request->get('description');
            $product->supplier_id = $request->get('supplier');
            $product->condition_o = $request->get('condition_o');
            $product->categoric = $request->get('categoric');
            $product->weight = $request->get('weight');
            $product->location = $request->get('location');
            $product->type = $request->get('type');
            $product->fcc_id = $request->get('fcc_id');
            $product->ic = $request->get('ic');
            $product->frequency = $request->get('frequency');
            $product->num_button = $request->get('num_button');
            $product->reusable = $request->get('reusable');
            $product->board_programming = $request->get('board_programming');
            $product->emergency_key = $request->get('emergency_key');
            $product->battery_part = $request->get('battery_part');
            $product->stock = $request->get('stock');
            $product->stock_minimum = $request->get('stock_minimum');
            $product->price = $request->get('price');
            $product->purchase_price = $request->get('purchase_price');
            $product->image = $url;
            $product->special = $special;
            $product->special_price = $request->get('special_price');
            
            if($product->save()){
                Product_model_year::where('id_product',$id)->delete();

                foreach($request->get('model') as $model){
                    foreach($request->get('year') as $year){
                         $data = [
                            'id_product' => $idProduct,
                            'id_maker'   => $request->get('id_maker'),
                            'id_model'  => $model,
                            'year' => $year,
                            'status' => 1, 
                        ];
                        $msj = "";
                        if(!Product_model_year::create($data)){

                            $msj.= 'Model: '.$model.'-'.$year.'/';
                        }
                      }
                }
                if($msj=="")  
                    Session::flash('message', 'Product '.$request->name.' saved! ');
                else
                    Session::flash('message', 'Product with years '.$request->name.' could not be saved!  ');    
                return Redirect::to('/product');  


            }else{

                Session::flash('message-error', 'Product '.$request->name.' could not be saved! ');
                return Redirect::back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $product = Product::find($id);
        $product->status = 0;
        
        if($product->save()){
          
            Session::flash('message', 'Product '.$product->name.' has been inactived! ');
            return Redirect::to('/product');

        }else{

            Session::flash('message-error', 'Product '.$product->name.' could not be inactived! ');
            return Redirect::back();
        }
    }

    /**
    * Select years.
    *
    * @param  
    * @return json
    */
    public function years(Request $request)
    {
        $years = array();
        if($request->ajax()){
            $end_year = date('Y') + 1;
            $start_year = $end_year - 20; 
            $j = 0;
            for($i= $start_year; $i <= $end_year; $i++){
                $years[$j] = $i;
                $j++;
            }
            return response()->json($years);    
            
        }
    }    


}
