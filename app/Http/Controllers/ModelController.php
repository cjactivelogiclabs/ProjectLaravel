<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCar;
use App\Maker;
use Redirect;
use Session;
use DB;

class ModelController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = ModelCar::where('status','=', '1')->get();
        return view('dashboard.model.index')->with(compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::where('status','=','1')->pluck('name','id');
       
        return view('dashboard.model.create')->with(compact('makers','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new ModelCar;
        $model->name = $request->name;
        $model->maker_id = $request->maker_id;
        $model->status = 1;

        if($model->save()){

            Session::flash('message', 'Model '.$request->name.' saved! ');

            return Redirect::to('/model');

        }else{

            Session::flash('message-error', 'Model '.$request->name.' could not be saved! ');
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
        $model = ModelCar::find($id);
        $makers = Maker::where('status','=','1')->pluck('name','id');
      
        return view('dashboard.model.edit')->with(compact('model','makers','years'));
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
        $model = ModelCar::find($id);

        $model->name = $request->name;        
     
        if($model->save()){

            Session::flash('message', 'Model '.$request->name.' updated! ');
           
            return Redirect::to('/model');

        }else{

            Session::flash('message-error', 'Model '.$request->name.' could not be updated! ');
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
        $model = ModelCar::find($id);
        $model->status = 0;
        
        if($model->save()){
          
                Session::flash('message','Model '.$model->name.' has been deleted!');
  
                return Redirect::to('/model');

        }else{

                Session::flash('message-error','Model '.$model->name.' could not be deleted!');
  
                return Redirect::to('/model');

        }


        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Model ' . $model->name.' has been deleted!',
                'id'      => $model->id
            ));
        }
        else
        {
            return Redirect::route('/model');
        }
    
    }

    /**
    * Select models for makers.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function modelsMaker1(Request $request,$idP, $id)
    {
        if($request->ajax()){
            $models = DB::table('models')->where('maker_id',$id)->get();
            return response()->json($models);
        }
    }
/**
    * Select models for makers.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function modelsMaker2(Request $request,$id)
    {
        if($request->ajax()){
            $models = DB::table('models')->where('maker_id',$id)->get();
            return response()->json($models);
        }
    }
}
