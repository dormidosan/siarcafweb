<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use App\Documento;
use App\Peticion;
use App\Periodo;

class PeticionController extends Controller
{
    //
	
	
	public function registrar_peticion(Request $request,Redirector $redirect)
    {
        //return view('home');
	
		

		//dd($request->all());
		//$documento = new Documento();
		$documentos_id = array();
		//$documentos =  array();
		$peticion = new Peticion();

/*
		//PROPUESTA DE LARAVEL 
		$peticion = new Peticione($request->all());
*/		


		// O USANDO LA MANERA TOSCA ANTIGUA
		$peticion->codigo = crc32(microtime());
		$peticion->nombre = $request->nombre;
		$peticion->descripcion = $request->descripcion;
		$peticion->peticionario = "invitado";
		$peticion->fecha = Carbon::now();
		$peticion->correo = $request->correo;
		$peticion->telefono = $request->telefono;
		$peticion->direccion = $request->direccion;
		$peticion->resuelto = 0;
		
		
		

		/*
		if($request->hasFile('documento')){
			foreach ($request->documento as $documento) {
				$filename = $documento->getClientOriginalName();
				print_r($filename."<br>");
			}

		}
		*/

		if($request->hasFile('documento')){
			foreach ($request->documento as $archivo) {
				$documento = new Documento();
				$documento->nombre_documento = $archivo->getClientOriginalName();
				//$documento->tipo = "documento peticion";
				$documento->tipo_documento_id = 1;
				$documento->periodo_id = Periodo::latest()->first()->id;
				$documento->fecha_ingreso = Carbon::now();
				
				//$ruta=  Hash::make('secret')."_".$archivo->getClientOriginalName();
				$ruta= MD5(microtime()).".".$archivo->getClientOriginalExtension();
				//$ruta="asd661s2";
				while(Documento::where('path', '=', $ruta)->first()){
					//dd('esta');
					$ruta= MD5(microtime()).".".$archivo->getClientOriginalExtension();
				}

				//dd('no esta');
				$r1=Storage::disk('documentos')->put($ruta,\File::get($archivo));
				$documento->path= $ruta;
				//$documento->save();
				

				//$filename = $documento->nombre_documento;
				//print_r($ruta."<br>");
				$documento->save();
				array_push($documentos_id, $documento->id);
			}

		}

//dd($documentos_id);
		//dd($peticion);


		// Guardar el archivo
		//$archivo =  $request->file('documento');	
		//$documento->nombre_documento = $request->input("nombre_documento");
		//$documento->tipo = "prueba_dictamen";
		//$documento->fecha_ingreso = Carbon::now();
		//$ruta=  Hash::make('secret')."_".$archivo->getClientOriginalName();
		//dd($ruta);
		//$r1=Storage::disk('documentos')->put($ruta,\File::get($archivo));
		//$documento->path= $ruta;
		//dd($ruta);
		//$dato->path = $ruta;
		//////////////////////////
		//$docente->asignaturas()->sync($materias);
		//$shop->products()->($product_id);
		//dd($documento->fecha_ingreso);
		//dd($ruta);
		
		
       //$documento->save();
        $peticion->save();
        //$peticion->documentos()->attach($documento);
		$peticion->documentos()->sync($documentos_id);

        //dd(1);
		return view('General.RegistroPeticion');
    }
}
