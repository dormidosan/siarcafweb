<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Session;
use Illuminate\Routing\Redirector;

class MailController extends Controller
{
    //
    public function crear_convocatoria(){


        return view('correo.crear_convocatoria');
    }


    public function mailing(request $request){
    	
    	Mail::send('correo.contact',$request->all(),function($msj){
    		$msj->from('siarcaf@gmail.com');
    		$msj->subject('correo de contacto');
    		$msj->to('siarcaf@gmail.com');
    	});

    	Session::flash('message','Mensaje enviado correctamente');

        return view('correo.crear_convocatoria');
    }



}
