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
	

	public function vista_registrar_peticion(Request $request,Redirector $redirect)
    {
    	 $peticion = Peticion::where('estado_peticion_id','=',0)->first(); // DEVUELVE CERO
    	 
        //dd($peticion);
		return view('General.RegistroPeticion')
        ->with('peticion',$peticion);
    }



	
	public function registrar_peticion(Request $request,Redirector $redirect)
    {
        //return view('home');
	
		
    	$disco = "../storage/documentos/";
		//dd($request->all());
		//$documento = new Documento();
		$documentos_id = array();
		//$documentos =  array();
		$peticion = new Peticion();
		

/*
		//PROPUESTA DE LARAVEL 
		$peticion = new Peticione($request->all());

			$table->unsignedInteger('estado_peticion_id');
            $table->string('codigo', 10)->nullable();
            $table->string('nombre', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->string('peticionario', 45)->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('correo', 45)->nullable();
            $table->string('telefono', 9)->nullable();
            $table->string('direccion', 45)->nullable();
            $table->boolean('resuelto')->nullable();
*/		


		// O USANDO LA MANERA TOSCA ANTIGUA
        $peticion->estado_peticion_id = '1'; // NUEVAS PETICIONES EN ESTADO RECIBIDO
		$peticion->codigo = hash("crc32", microtime(), false); 
		$peticion->nombre = $request->nombre;
		$peticion->descripcion = $request->descripcion;
		$peticion->peticionario = $request->peticionario;;
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

		// PETICION = 1
		// ATESTADO = 2

		if($request->hasFile('documento_peticion')){
				$archivo = $request->documento_peticion;  
				$documento = new Documento();
				$documento->nombre_documento = $archivo->getClientOriginalName();
				$documento->tipo_documento_id = 1; // PETICION = 1
				$documento->periodo_id = Periodo::latest()->first()->id;
				$documento->fecha_ingreso = Carbon::now();
				$ruta= MD5(microtime()).".".$archivo->getClientOriginalExtension();

				while(Documento::where('path', '=', $ruta)->first()){
					$ruta= MD5(microtime()).".".$archivo->getClientOriginalExtension();
				}

				$r1=Storage::disk('documentos')->put($ruta,\File::get($archivo));
				$documento->path= $ruta;
				$documento->save();
				array_push($documentos_id, $documento->id);
			

		}



		if($request->hasFile('documento_atestado')){
			foreach ($request->documento_atestado as $archivo) {
				$documento = new Documento();
				$documento->nombre_documento = $archivo->getClientOriginalName();
				//$documento->tipo = "documento peticion";
				$documento->tipo_documento_id = 2;  // ATESTADO = 2
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
		return view('General.RegistroPeticion')
        ->with('disco',$disco)
        ->with('peticion',$peticion);
    }
}
