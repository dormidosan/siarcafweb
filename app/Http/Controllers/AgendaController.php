<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Storage;
use App\Agenda;
use App\Punto;
use App\Propuesta;

class AgendaController extends Controller
{
    //
    public function sesion_plenaria()
    {
    	$agendas = Agenda::where('vigente', '=', '1')->orderBy('created_at', 'ASC')->get();

        return view('Agenda.CrearSesionPlenaria')
        ->with('agendas', $agendas);
    }

    public function iniciar_sesion_plenaria(Request $request,Redirector $redirect)
    {
    	
    	$agenda = Agenda::where('id', '=', $request->id_agenda)->first();
    	$puntos = Punto::where('agenda_id', '=', $agenda->id)->orderBy('numero','ASC')->get();
    	

        return view('Agenda.listado_puntos_plenaria')
        ->with('agenda', $agenda)
        ->with('puntos', $puntos);
    }

    public function discutir_punto_plenaria(Request $request,Redirector $redirect)
    {
    	
    	$agenda = Agenda::where('id', '=', $request->id_agenda)->first();
    	$punto = Punto::where('id', '=', $request->id_punto)->first();
    	$propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja','ASC')->orderBy('ronda','ASC')->get();
    	$disco = "../storage/documentos/";
    	
    	

        return view('Agenda.discutir_punto_plenaria')
        ->with('disco', $disco)
        ->with('agenda', $agenda)
        ->with('punto', $punto)
        ->with('propuestas', $propuestas);
    }

    public function agregar_propuesta(Request $request,Redirector $redirect)
    {
    	
    	$agenda = Agenda::where('id', '=', $request->id_agenda)->first();
    	$punto = Punto::where('id', '=', $request->id_punto)->first();
    	

    	
		$propuesta = new Propuesta();
    	$propuesta->punto_id = $punto->id;
    	$propuesta->nombre_propuesta = $request->nueva_propuesta;
    	$propuesta->votado = '0';
    	$propuesta->activa = '1';
    	$propuesta->ronda = '1';
    	$propuesta->pareja = 1 + Propuesta::where('punto_id', '=', $punto->id)->max('pareja');
    	$propuesta->save();
    	
    	

    	//$propuesta2 = new Propuesta();
    	//$propuesta2->punto_id = $punto->id;
    	//$propuesta2->nombre_propuesta = $request->nueva_propuesta;
    	//$propuesta2->ronda = '2';
    	//$propuesta2->activa = '1';
    	//$propuesta2->save();


    	$disco = "../storage/documentos/";

    	$propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja','ASC')->orderBy('ronda','ASC')->get();
        return view('Agenda.discutir_punto_plenaria')
        ->with('disco', $disco)
        ->with('agenda', $agenda)
        ->with('punto', $punto)
        ->with('propuestas', $propuestas);
    }

    public function modificar_propuesta(Request $request,Redirector $redirect)
    {
    	
    	$agenda = Agenda::where('id', '=', $request->id_agenda)->first();
    	$punto = Punto::where('id', '=', $request->id_punto)->first();
    	
    	$propuesta_antigua = Propuesta::where('id', '=', $request->id_propuesta)->first();

    	// opcion 1 es para segunda ronda , opcion 2 es para eliminar la propuesta
    	if ($request->opcion == 1) {
			$propuesta_nueva = new Propuesta();
	    	$propuesta_nueva->punto_id = $punto->id;
	    	$propuesta_nueva->nombre_propuesta = $propuesta_antigua->nombre_propuesta;
	    	$propuesta_nueva->votado = '0';
	    	$propuesta_nueva->activa = '1';
	    	$propuesta_nueva->ronda = '2';
	    	$propuesta_nueva->pareja = $propuesta_antigua->pareja;
	    	$propuesta_nueva->save();
	    	$propuesta_antigua->activa = '0';
	    	$propuesta_antigua->save();
    	} else {
    		$propuesta_antigua->delete();
    	}
 
    	$disco = "../storage/documentos/";

    	$propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja','ASC')->orderBy('ronda','ASC')->get();
        return view('Agenda.discutir_punto_plenaria')
        ->with('disco', $disco)
        ->with('agenda', $agenda)
        ->with('punto', $punto)
        ->with('propuestas', $propuestas);
    }

    public function guardar_votacion(Request $request,Redirector $redirect)
    {
    	
    	$agenda = Agenda::where('id', '=', $request->id_agenda)->first();
    	$punto = Punto::where('id', '=', $request->id_punto)->first();
    	
    	$propuesta = Propuesta::where('id', '=', $request->id_propuesta)->first();

    	$propuesta->favor = $request->favor;
    	$propuesta->contra = $request->contra;
    	$propuesta->abstencion = $request->abstencion;
    	$propuesta->nulo = $request->nulo;
    	$propuesta->votado = '1';
	    $propuesta->activa = '1';
	    $propuesta->save();
  
 
    	$disco = "../storage/documentos/";

    	$propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja','ASC')->orderBy('ronda','ASC')->get();
        return view('Agenda.discutir_punto_plenaria')
        ->with('disco', $disco)
        ->with('agenda', $agenda)
        ->with('punto', $punto)
        ->with('propuestas', $propuestas);
    }

    
    

}
