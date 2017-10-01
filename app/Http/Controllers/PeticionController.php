<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PeticionController extends Controller
{
    //
	
	
	public function registrar_peticion(Request $request,Redirector $redirect)
    {
        //return view('home');
		
		dd($request->all());
		//$dato = new Dato($request->all());
    }
}
