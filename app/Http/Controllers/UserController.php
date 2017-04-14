<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use App\User;
use App\Countrie;
use App\State;
use DB;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(request $request)
    {
        //
      $users = User::where('type','%')->orderBy('type')->get();
      return view('dashboard.client.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.client.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(User::create($request->all())){

            Session::flash('message', 'User '.$request->name.' saved! ');
            return Redirect::to('/user');

        }else{

            Session::flash('message-error', 'User '.$request->name.' could not be saved! ');
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
       
       $user = User::find($id);
       return view("dashboard.client.show")
       ->with("user",$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::find($id);
       return view("dashboard.client.edit")
       ->with("user",$user);
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
       User::find($id)->update($request->all());
       return redirect()->route('dashboard.client.index')
                        ->with('success','Data successfully modified!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
       User::find($id)->update($request->all());
       $countries = Countrie::pluck('name', 'id');
       $states = State::pluck('name', 'id');
       $user = User::find($id);
       return view("user.profile")
       ->with("user",$user)
       ->with("countries",$countries)
       ->with("states",$states)
       ->with("company_type",$user->company_type_constant)
       ->with("interested",$user->interested_constant)
       ->with('success','Updated profile successfully!');
    }

    /**
    * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
       $countries = Countrie::pluck('name', 'id');
       $states = State::pluck('name', 'id');
       $user = User::find($id);
       return view("user.profile")
       ->with("user",$user)
       ->with("countries",$countries)
       ->with("states",$states)
       ->with("company_type",$user->company_type_constant)
       ->with("interested",$user->interested_constant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if(User::find($id)->delete()){

            Session::flash('message', 'User '.$request->name.' has been deleted! ');
            return Redirect::to('/user');

        }else{

            Session::flash('message-error', 'User '.$request->name.' could not be deleted! ');
            return Redirect::back();
        }
    }


}
