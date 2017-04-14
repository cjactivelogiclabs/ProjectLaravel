<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Maker;
use Redirect;
use Session;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makers = Maker::where('status','=', '1')->get();
        return view('dashboard.maker.index')->with(compact('makers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.maker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maker = new Maker;
        $maker->name = $request->name;
        $maker->description = $request->name;
       
        if($maker->save()){

            Session::flash('message', 'Maker '.$request->name.' saved! ');
            return Redirect::to('/maker');

        }else{

            Session::flash('message-error', 'Maker '.$request->name.' could not be saved! ');
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
        $maker = Maker::find($id);
        return view('dashboard.maker.edit')->with(compact('maker'));
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
        $maker = Maker::find($id);

        $maker->name = $request->name;
        $maker->description = $request->name;

        if($maker->save()){

            Session::flash('message', 'Maker '.$request->name.' updated! ');
            return Redirect::to('/maker');

        }else{

            Session::flash('message-error', 'Maker '.$request->name.' could not be updated! ');
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
        $maker = Maker::find($id);
        $maker->status = 0;
        
        if($maker->save()){
          
                Session::flash('message','Maker '.$maker->name.' has been deleted!');
  
                return Redirect::to('/maker');

        }else{

                Session::flash('message-error','Maker '.$maker->name.' could not be deleted!');
  
                return Redirect::to('/maker');

        }


        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Maker ' . $maker->name.' has been deleted!',
                'id'      => $maker->id
            ));
        }
        else
        {
            return Redirect::route('/maker');
        }
    
    }

}
