<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\ModelCar;
use App\Maker;
use App\Product;
use App\Slide;
use App\User;
use App\Product_model_year;


Route::get('/', function () {
    if(Auth::guest() ||  Auth::user()->type == 0){

         $slides = Slide::where('status','=','1')->orderBy('main','desc')->get();

         $products = Product::where('status','=','1')->orderBy('created_at','desc')->get();

         $tot_products = Product::where('status','=','1')->count();
      
            
        $items = array(4,3,1);
      
         if($tot_products<4){
            $items[0] = $tot_products;
            $items[1] = $tot_products;
            $items[2] = 1;
         }  

         $makers = Maker::where('status','=','1')->orderBy('name','asc')->pluck('name','id');
        
         $models = ModelCar::where('status','=','1')->orderBy('name','asc')->pluck('name','id');
        
         $years = Product_model_year::distinct()->select('year')->groupBy('year')->pluck('year','year');
         /*DB::table('products')
          ->select('distinct (id_year)')
          ->orderBy('id_year')->get();*/
         
        return view('website.index')->with(compact('slides','products','makers','models','years','items'));
    }
    else{
        
        $products = Product::where('status','=','1')->count();
        $clients = User::where('type', '=','0')->count();

        return view('dashboard.index')->with(compact('products','clients'));
    }
});

Route::get('/contact', function () {
    return view('website.contact');
});

Route::get('/aboutus', function () {
    return view('website.aboutus');
});


Route::get('/product-detail/{id}', 'WebsiteController@productDetail');

Route::get('/bcm/calculator/{bcm}', 'BCMController@searchBCM');

Route::resource('search','SearchController@resultSearch');

Auth::routes();

Route::get('/dashboard','DashboardController@index');

Route::resource('user', 'UserController');

Route::resource('product', 'ProductController');

Route::resource('slide', 'SlideController@index');

Route::resource('maker', 'MakerController');

Route::get('maker/{id}/delete', 'MakerController@destroy');

Route::resource('year', 'YearController');

Route::get('year/{id}/delete', 'YearController@destroy');

Route::resource('model', 'ModelController');

Route::get('model/{id}/delete', 'ModelController@destroy');

Route::get('/clientProfile/{id}', 'UserController@profile');

Route::get('clientProfile/stateCountry/{id}', 'WebsiteController@stateCountries');

Route::get('/stateCountry/{id}', 'WebsiteController@stateCountries');

Route::get('/product/{idP}/modelMaker/{id}', 'ModelController@modelsMaker1');

Route::get('/product/modelMaker/{id}', 'ModelController@modelsMaker2');

Route::get('/product/years', 'ProductController@years');

Route::PUT('updateProfile/{id}', 'UserController@updateProfile');

Route::get('years', function (Illuminate\Http\Request  $request) {
       
        $term = $request->term ?: '';
        $tags = array();
        $end_year = date('Y') + 1;
        $start_year = $end_year - 20; 
        $j = 0;
            for($i= $start_year; $i <= $end_year; $i++){
                $tags[$j] = $i;
                $j++;
            }
        $valid_tags = [];
        foreach ($tags as $id => $tag) {
            $valid_tags[] = ['id' => $tag, 'text' => $tag];
        }
        return \Response::json($valid_tags);

    });

Route::get('models', function (Illuminate\Http\Request  $request) {
        $term = $request->term ?: '';
        $id_maker = $request->maker ?: '';
        $tags = App\ModelCar::where([['name', 'like', $term.'%'],['maker_id',$id_maker]])->pluck('name', 'id');
        $valid_tags = [];
        foreach ($tags as $id => $tag) {
            $valid_tags[] = ['id' => $id, 'text' => $tag];
        }
        return \Response::json($valid_tags);
    });

//Shopping cart
Route::get('cart/show', [
    'as' => 'cart-show',
    'uses' => 'CartController@show'
]);

Route::get('cart/add/{id}', [
    'as' => 'cart-add',
    'uses' => 'CartController@add'
]);

Route::post('cart/update', [
    'as' => 'cart-update',
    'uses' => 'CartController@update'
]);