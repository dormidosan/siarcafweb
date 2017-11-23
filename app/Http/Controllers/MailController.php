<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Session;
use Illuminate\Routing\Redirector;
use App\User;

class MailController extends Controller
{
    //
    public function crear_convocatoria(){


        return view('correo.crear_convocatoria');
    }


    public function mailing(request $request){
    	/*
    	Mail::send('correo.contact',$request->all(),function($msj){
    		$msj->from('siarcaf@gmail.com');
    		$msj->subject('correo de contacto');
    		$msj->to('siarcaf@gmail.com');
    	});
   */
   		$destinos = User::where('id','<','5')->get();
   		//dd($destinos);
/*
   		foreach ($destinos as $user) {

	   			 Mail::later(5,'correo.contact',$request->all(), function ($message) use ($user) { 
				     $message->from('from@example.com'); 
				     $message->to($user->email,$user->name)->subject($user->name." ".'Welcome!!!'); 
	 });

   		}
*/
      foreach ($destinos as $user) {

           Mail::queue('correo.contact',$request->all(), function ($message) use ($user) { 
             $message->from('from@example.com'); 
             $message->subject("TODO ESTA PERDIDO ".$user->name." ".'Welcome!!!');
             $message->to($user->email,$user->name); 
   });

      }
    	

    	Session::flash('message','Mensaje enviado correctamente');

        return view('correo.crear_convocatoria');
    }



}
