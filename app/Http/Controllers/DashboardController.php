<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;

class DashboardController extends Controller
{
    //

    public function index(){

    	$products = Product::where('status','=','1')->count();
        $clients = User::where('type', '=','0')->count();

    	return view('dashboard.index')->with(compact('products','clients'));
    }
}
