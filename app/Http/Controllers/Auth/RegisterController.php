<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Countrie;
use App\State;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'address' => 'required|max:255', 
            'city' => 'required|max:150',
            'zipcode' => 'required',
            'id_state' => 'required',
            'phone' => 'required',
            'hear_about_us' => 'required',
            'company_type' => 'required',
            'interested_in' => 'required',
            'programmer_using' => 'required',      
        ],
        [
            'email.unique' => 'The email already exists',
            'name.required' => 'The name is require',
            'address.required' => 'The city is require', 
            'city.required' => 'The address is require', 
            'hear_about_us.required' => 'The hear about us is require',
            'company_type.required' => 'The company type is require',
            'interested_in.required' => 'The Manily interested in is require',
            'programmer_using.required' => 'The Programmer/Machine you are using is require',
       ]);
    }

    /**
    * Show the form for register an user or client.
    *
    */
    public function showregistrationform()
    {
       $countries = Countrie::pluck('name', 'id');
       $states = State::pluck('name', 'id');
       $user = new User;
       return view("auth.register")
       ->with("countries",$countries)
       ->with("states",$states)
       ->with("company_type",$user->company_type_constant)
       ->with("interested",$user->interested_constant);
    } 

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'city' => $data['city'],
            'zipcode' => $data['zipcode'],
            'id_country' => $data['id_countrie'],
            'id_state' => $data['id_state'],
            'hear_about_us' => $data['hear_about_us'],
            'company_type' => $data['company_type'],
            'interested_in' => $data['interested_in'],
            'programmer_using' => $data['programmer_using'],

        ]);
    }


}
