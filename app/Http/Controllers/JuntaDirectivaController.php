<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Routing\Redirector;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Peticion;
use App\Comision;
use App\Seguimiento;
use App\EstadoSeguimiento;


class JuntaDirectivaController extends Controller
{
    //
    public function trabajo_junta_directiva(){


        return view('jdagu.trabajo_junta_directiva');
    }


    public function listado_peticiones_jd(){

    	$peticiones = Peticion::where('id','!=',0)->get(); //->paginate(10); para obtener todos los resultados  o null
    	
        return view('jdagu.listado_peticiones_jd')
        ->with('peticiones',$peticiones);
    }

    public function seguimiento_peticion_jd(Request $request,Redirector $redirect){

    	$id_peticion = $request->id_peticion;
    	$disco = "../storage/documentos/";

    	$peticion = Peticion::where('id','=',$id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
    	//dd($peticion);
    	return view('jdagu.seguimiento_peticion_individual_jd')
		->with('disco',$disco)
        ->with('peticion',$peticion);

    }


    public function reunion_jd(Request $request,Redirector $redirect){
    	$peticiones = Peticion::where('id','!=',0)->orderBy('estado_peticion_id','ASC')->orderBy('updated_at','ASC')->get(); // Primero ordenar por el estado, despues los estados ordenarlo por fechas
    	
		return view('jdagu.reunion_jd')
        ->with('peticiones',$peticiones);
	}

	public function asignar_comision_jd(Request $request,Redirector $redirect){
    	$id_peticion = $request->id_peticion;
    	$disco = "../storage/documentos/";

    	$peticion = Peticion::where('id','=',$id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
    	$comisiones = Comision::where('id','!=', '1')->pluck('nombre','id');
    	$seguimientos = Seguimiento::where('peticion_id','=',$id_peticion)->where('activo', '=', 1)->get();

		return view('jdagu.lista_asignacion')
        ->with('comisiones',$comisiones)
        ->with('seguimientos',$seguimientos)
        ->with('peticion',$peticion);
	}

	public function enlazar_comision(Request $request,Redirector $redirect){
		//dd($request->all());
		$id_peticion = $request->id_peticion;
		$id_comision = $request->comisiones;
		$descripcion = $request->descripcion;
		$seguimiento = new Seguimiento();
		$peticion = Peticion::where('id','=',$id_peticion)->firstOrFail();
		$comision = Comision::where('id','=', $id_comision)->firstOrFail();


		if (! $peticion->comisiones->contains($id_comision)) {

			 

			$seguimiento->peticion_id = $peticion->id;
			$seguimiento->comision_id = $comision->id;
			$seguimiento->estado_seguimiento_id = EstadoSeguimiento::where('estado', '=', "creacion")->first()->id;
			$seguimiento->inicio = Carbon::now();
			//$seguimiento->fin = Carbon::now();
			$seguimiento->activo = '1';
			$seguimiento->agendado = '0';
			//$seguimiento->descripcion = Parametro::where('parametro','=','des_nuevo_seguimiento')->get('valor');
			$seguimiento->descripcion = $descripcion;
			$guardado = $seguimiento->save();
			if($guardado){
			$peticion->comisiones()->attach($id_comision); 	
			}
			

		}		


		//$peticion->comisiones()->sync([$id_comision], false);  //$model->sync(array $ids, $detaching = true)
		//$peticion->comisiones()->attach($id_comision);
		
		// 


		$peticion = Peticion::where('id','=',$id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
    	$comisiones = Comision::where('id','!=', '1')->pluck('nombre','id');
    	$seguimientos = Seguimiento::where('peticion_id','=',$id_peticion)->where('activo', '=', 1)->get();

		return view('jdagu.lista_asignacion')
        ->with('comisiones',$comisiones)
        ->with('seguimientos',$seguimientos)
        ->with('peticion',$peticion);
	}



}
