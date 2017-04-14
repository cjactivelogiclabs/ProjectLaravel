<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Session;
use Redirect;
use App\Slide;
use DB;  

class slideController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $slides = DB::table('slides')
          ->select('slides.*')
          ->orderBy('main')->get();
        return view('dashboard.slide.index',compact('slides'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $main = DB::table('slides')->where('main','=',1)->count();
       
       return view("dashboard.slide.create")->with('main',$main);
    }


  //
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $ruta = "";
            $idSlide = DB::table('slides')->max('id');
            $idSlide = $idSlide+1; 
            $nameFile = 'Slide-'.$idSlide;
            //$path = $request->file('ImageFile')->storeAs('slideImages', $nameFile ,'public');  
            //$path = $request->file('ImageFile')->storePubliclyAs('SlideImages',$nameFile, 'local');
            //$url = Storage::url($path); 

            $file = $nameFile.".".$request->file('ImageFile')->getClientOriginalExtension();

            $request->file('ImageFile')->move(base_path() . '/public/storage/SlideImages', $file);           

            $main = 0;
            if($request->get('main')==1)
                $main = 1;
            
            $data = [
                        'title'   => $request->get('title'),
                        'description' => $request->get('description'),
                        'status' => 1, 
                        'image' => 'storage/SlideImages/'.$file,
                        'main' => $main
                    ];
            if(Slide::create($data)){

                Session::flash('message', 'Slide '.$request->title.' saved! ');
                return Redirect::to('/slide');

            }else{

                Session::flash('message-error', 'Slide Image '.$request->title.' could not be saved! ');
                return Redirect::back();
            }
       
    }

/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $slide = Slide::find($id);
       return view("dashboard.slide.edit")
       ->with("slide",$slide);
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
            $slide = Slide::find($id);
            $ruta = "";
            $idslide = $slide->id;
            $url =  $slide->image;
            $nameFile = 'Slide-'.$idslide;
            
            if($request->file('ImageFile')){
               /* $exists = Storage::disk('local')->exists($nameFile);
                if($exists)
                    Storage::delete('file.jpg');
                $path = $request->file('ImageFile')->storePubliclyAs('SlideImages',$nameFile, 'local');  
                $url = Storage::url($path); */

                unlink(base_path() .'/public/'.$slide->image);

                $file = $nameFile.".".$request->file('ImageFile')->getClientOriginalExtension();

                $request->file('ImageFile')->move(base_path() . '/public/storage/SlideImages', $file); 

                $url = 'storage/SlideImages/'.$file;          

            }
            $main = 0;
            if($request->get('main')==1)
                $main = 1;

            $slide->title   = $request->get('title');
            $slide->description = $request->get('description');
            $slide->image = $url;
            $slide->main = $main;
            
            if($slide->save()){
                
                Session::flash('message', 'Slide '.$request->name.' saved! ');
                return Redirect::to('/slide');

            }else{

                Session::flash('message-error', 'Slide '.$request->name.' could not be saved! ');
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
       
        $slide = Slide::find($id);
        $msj = "inactived";

        if($slide->status==0){

            $slide->status = 1;
            $msj = "actived";
        }
        else{

            $slide->status = 0;
        }
        
        if($slide->save()){
          
            Session::flash('message', 'slide '.$slide->title.' has been '.$msj.'! ');
            return Redirect::to('/slide');

        }else{

            Session::flash('message-error', 'slide '.$slide->title.' could not be '.$msj.'! ');
            return Redirect::back();
        }
    }


}
