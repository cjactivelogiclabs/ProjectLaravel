<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Codigo;

class BCMController extends Controller
{
    //
     public function searchBCM(Request $request){
    	
    	 if($request->ajax()){
            $codigos = Codigo::where('codigo', '=', $request->bcm)->get();
            return response()->json($codigos);
        }

    }
}
