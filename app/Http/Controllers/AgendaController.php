<?php

namespace App\Http\Controllers;



use App\Periodo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Cache;
use Storage;
use App\Agenda;
use App\Punto;
use App\Propuesta;
use App\Intervencion;
use App\Asambleista;
use App\Peticion;
use App\EstadoPeticion;
use App\Comision;
use App\Seguimiento;
use App\EstadoSeguimiento;
use App\Asistencia;

class AgendaController extends Controller
{
    public function getRomanNumerals($decimalInteger)
    {
        $n = intval($decimalInteger);
        $res = '';

        $roman_numerals = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1);

        foreach ($roman_numerals as $roman => $numeral) {
            $matches = intval($n / $numeral);
            $res .= str_repeat($roman, $matches);
            $n = $n % $numeral;
        }

        return $res;
    }

    public function sala_sesion_plenaria(Request $request,Redirector $redirect)
    {

    	$agenda = Agenda::where('id', '=', $request->id_agenda)->first();
    	$periodo_activo = Periodo::where('activo','=', 1)->first();

        $array_asambleistas_sesion = Asistencia::where('agenda_id','=',$agenda->id)->pluck('asambleista_id')->toArray();

        $asambleistas = Asambleista::where('activo','=', 1)            
            ->where("periodo_id",$periodo_activo->id)
            ->where('facultad_id','=','5')
            ->whereNotIn('id',$array_asambleistas_sesion)
            ->get();

        $ultimos_ingresos  = Asistencia::where('agenda_id','=',$agenda->id)->orderBy('created_at', 'DESC')->take(5)->get();

        //return view('Agenda.CrearSesionPlenaria')

        return view('Agenda.sala_sesion_plenaria')        
        ->with('agenda', $agenda)
        ->with('asambleistas', $asambleistas)
        ->with('ultimos_ingresos', $ultimos_ingresos);






    }

    public function iniciar_sesion_plenaria(Request $request, Redirector $redirect)
    {
    	$agenda = Agenda::where('id', '=', $request->id_agenda)->first();
    	$puntos = Punto::where('agenda_id', '=', $agenda->id)->orderBy('numero','ASC')->get();

    	if ($request->get("retornar") == "retornar"){
            $agenda->vigente = '1'; // ya esta vigente asi que no es necesario realmente
            $agenda->activa = '1';
            $agenda->save();
            //dd($request->get("retornar"));
        }

        $actualizado = 0;

        return view('Agenda.listado_puntos_plenaria')
            ->with('actualizado', $actualizado)
            ->with('agenda', $agenda)
            ->with('puntos', $puntos);
    }

    public function finalizar_sesion_plenaria(Request $request,Redirector $redirect)
    {
        
        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $puntos = Punto::where('agenda_id', '=', $agenda->id)->orderBy('numero','ASC')->get();
        $puntos_activos = Punto::where('agenda_id', '=', $agenda->id)->where('activo', '=', '1')->count();
        
        // si ya no hay puntos activos , regresar a pantalla de listado de sesiones plenarias
        if ($puntos_activos == '0') {
            //$agendas = Agenda::where('vigente','=', '1')->orderBy('created_at', 'ASC')->get();
            $agenda->activa  = '0';
            $agenda->vigente = '0';
            $agenda->save();

            $agendas = Agenda::where('vigente','=','1')->orderBy('created_at', 'ASC')->get();
            //$puntos = Punto::all();
            return view('Agenda.consultar_agendas_vigentes')
            ->with('agendas',$agendas);

        } 
        
        
        $actualizado = 0;
        return view('Agenda.listado_puntos_plenaria')
        ->with('actualizado',$actualizado)
        ->with('agenda', $agenda)
        ->with('puntos', $puntos);
    }

    public function pausar_sesion_plenaria(Request $request,Redirector $redirect)
    {
        
        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $agenda->fin = Carbon::now()->format('Y-m-d H:i:s');
        $agenda->save();
        
        $agendas = Agenda::where('vigente','=','1')->orderBy('created_at', 'ASC')->get();
        //$puntos = Punto::all();
        return view('Agenda.consultar_agendas_vigentes')
        ->with('agendas',$agendas);
    }

    public function comision_punto_plenaria(Request $request,Redirector $redirect)
    {
        
        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();
        $peticion = Peticion::where('id', '=', $punto->peticion_id)->first();


        //$id_peticion = $request->id_peticion;

        //$peticion = Peticion::where('id', '=', $id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
        //$reunion = Reunion::where('id', '=', $request->id_reunion)->firstOrFail();
        //$comision = Comision::where('id', '=', $request->id_comision)->firstOrFail();
        $comisiones = Comision::where('id', '!=', '1')->pluck('nombre', 'id');  // traer todas las comisiones menos la JD
        $seguimientos = Seguimiento::where('peticion_id', '=', $peticion->id)->where('activo', '=', 1)->get();

        return view('Agenda.lista_asignacion_plenaria')
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('peticion', $peticion)
            ->with('comisiones', $comisiones)
            ->with('seguimientos', $seguimientos);

    }

    public function asignar_comision_punto(Request $request,Redirector $redirect)
    {
        //dd($request->all());

        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();

        $id_peticion = $request->id_peticion;
        $id_comision = $request->comisiones;
        $descripcion = $request->descripcion;

        $peticion = Peticion::where('id', '=', $id_peticion)->firstOrFail();
        $comision = Comision::where('id', '=', $id_comision)->firstOrFail();


        if (!$peticion->comisiones->contains($id_comision)) {

            $seguimiento = new Seguimiento();
            $seguimiento->peticion_id = $peticion->id;
            $seguimiento->comision_id = $comision->id;
            $seguimiento->estado_seguimiento_id = EstadoSeguimiento::where('estado', '=', "se")->first()->id; // SE Seguimiento
            $seguimiento->inicio = Carbon::now();
            //$seguimiento->fin = Carbon::now();
            $seguimiento->activo = '1';
            $seguimiento->agendado = '0';
            //$seguimiento->descripcion = Parametro::where('parametro','=','des_nuevo_seguimiento')->get('valor');
            $seguimiento->descripcion = "Inicio de control en: " . $comision->nombre . " - " . $descripcion;
            $guardado = $seguimiento->save();
            if ($guardado) {
                $peticion->comisiones()->attach($id_comision);
            }


            $seguimiento = new Seguimiento();
            $seguimiento->peticion_id = $peticion->id;
            $seguimiento->comision_id = $comision->id;
            $seguimiento->estado_seguimiento_id = EstadoSeguimiento::where('estado', '=', "as")->first()->id; // AS Asignado
            $seguimiento->inicio = Carbon::now();
            $seguimiento->fin = Carbon::now();
            $seguimiento->activo = '0';
            $seguimiento->agendado = '0';
            //$seguimiento->descripcion = Parametro::where('parametro','=','des_nuevo_seguimiento')->get('valor');
            $seguimiento->descripcion = "Asignado a: " . $comision->nombre . " - " . $descripcion;
            $guardado = $seguimiento->save();

            //if($guardado){
            //$peticion->comisiones()->attach($id_comision);
            //}
            $peticion->comision = 1;  // quiere decir que este punto esta en una comision
            $peticion->agendado = 0;
            $peticion->asignado_agenda = 0;
            $peticion->estado_peticion_id = EstadoPeticion::where('estado', '=', "co")->first()->id; // AS Asignado
            $peticion->save();

        }


        //$peticion->comisiones()->sync([$id_comision], false);  //$model->sync(array $ids, $detaching = true)
        //$peticion->comisiones()->attach($id_comision);

        //
        $punto->activo   = '0';
        $punto->retirado = '0';
        $punto->save();

        //$peticion = Peticion::where('id','=',$id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
        $comisiones = Comision::where('id', '!=', '1')->pluck('nombre', 'id');  // traer todas las comisiones menos la JD
        $seguimientos = Seguimiento::where('peticion_id', '=', $id_peticion)->where('activo', '=', 1)->get();

        return view('Agenda.lista_asignacion_plenaria')
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('peticion', $peticion)          ////
            ->with('comisiones', $comisiones)      ////
            ->with('seguimientos', $seguimientos); ////
      

    }


    

    public function discutir_punto_plenaria(Request $request,Redirector $redirect)

    {

        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();


        // ******* CUERPO

        // ******* CUERPO


        $propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja', 'ASC')->orderBy('ronda', 'ASC')->get();
        //remplazar esta busqueda con los asambleistas realmente presentes
        $presentes = Asambleista::where('id', '<', '6')->get();
        $asambleistas_plenaria[] = array();
        foreach ($presentes as $asambleista) {
            $asambleistas_plenaria[$asambleista->id] = $asambleista->user->persona->primer_nombre
                . ' ' . $asambleista->user->persona->segundo_nombre
                . ' ' . $asambleista->user->persona->primer_apellido
                . ' ' . $asambleista->user->persona->segundo_apellido;
        }
        unset($asambleistas_plenaria[0]);
        $disco = "../storage/documentos/";

        return view('Agenda.discutir_punto_plenaria')
            ->with('disco', $disco)
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('asambleistas_plenaria', $asambleistas_plenaria)
            ->with('propuestas', $propuestas);
    }

    public function agregar_propuesta(Request $request, Redirector $redirect)
    {

        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();
        //dd($request->all());

        // ******* CUERPO DEL METODO
        $propuesta = new Propuesta();
        $propuesta->punto_id = $punto->id;
        $propuesta->asambleista_id = $request->asambleista_id;
        $propuesta->nombre_propuesta = $request->nueva_propuesta;
        $propuesta->votado = '0';
        $propuesta->activa = '1';
        $propuesta->ronda = '1';
        $propuesta->pareja = 1 + Propuesta::where('punto_id', '=', $punto->id)->max('pareja');
        $propuesta->save();
        // ******* CUERPO DEL METODO


        $propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja', 'ASC')->orderBy('ronda', 'ASC')->get();
        //remplazar esta busqueda con los asambleistas realmente presentes
        $presentes = Asambleista::where('id', '<', '6')->get();
        $asambleistas_plenaria[] = array();
        foreach ($presentes as $asambleista) {
            $asambleistas_plenaria[$asambleista->id] = $asambleista->user->persona->primer_nombre
                . ' ' . $asambleista->user->persona->segundo_nombre
                . ' ' . $asambleista->user->persona->primer_apellido
                . ' ' . $asambleista->user->persona->segundo_apellido;
        }
        unset($asambleistas_plenaria[0]);
        $disco = "../storage/documentos/";

        return view('Agenda.discutir_punto_plenaria')
            ->with('disco', $disco)
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('asambleistas_plenaria', $asambleistas_plenaria)
            ->with('propuestas', $propuestas);
    }

    public function modificar_propuesta(Request $request, Redirector $redirect)
    {

        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();


        // ******* CUERPO DEL METODO
        $propuesta_antigua = Propuesta::where('id', '=', $request->id_propuesta)->first();

        // opcion 1 es para segunda ronda , opcion 2 es para eliminar la propuesta
        if ($request->opcion == 1) {
            $propuesta_nueva = new Propuesta();
            $propuesta_nueva->punto_id = $punto->id;
            $propuesta_nueva->asambleista_id = $propuesta_antigua->asambleista_id;
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
        // ******* CUERPO DEL METODO


        $propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja', 'ASC')->orderBy('ronda', 'ASC')->get();
        //remplazar esta busqueda con los asambleistas realmente presentes
        $presentes = Asambleista::where('id', '<', '6')->get();
        $asambleistas_plenaria[] = array();
        foreach ($presentes as $asambleista) {
            $asambleistas_plenaria[$asambleista->id] = $asambleista->user->persona->primer_nombre
                . ' ' . $asambleista->user->persona->segundo_nombre
                . ' ' . $asambleista->user->persona->primer_apellido
                . ' ' . $asambleista->user->persona->segundo_apellido;
        }
        unset($asambleistas_plenaria[0]);
        $disco = "../storage/documentos/";

        return view('Agenda.discutir_punto_plenaria')
            ->with('disco', $disco)
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('asambleistas_plenaria', $asambleistas_plenaria)
            ->with('propuestas', $propuestas);
    }

    public function guardar_votacion(Request $request, Redirector $redirect)
    {

        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();


        // ******* CUERPO DEL METODO
        $propuesta = Propuesta::where('id', '=', $request->id_propuesta)->first();
        $propuesta->favor = $request->favor;
        $propuesta->contra = $request->contra;
        $propuesta->abstencion = $request->abstencion;
        $propuesta->nulo = $request->nulo;
        $propuesta->votado = '1';
        $propuesta->activa = '1';
        $propuesta->save();
        // ******* CUERPO DEL METODO


        $propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja', 'ASC')->orderBy('ronda', 'ASC')->get();
        //remplazar esta busqueda con los asambleistas realmente presentes
        $presentes = Asambleista::where('id', '<', '6')->get();
        $asambleistas_plenaria[] = array();
        foreach ($presentes as $asambleista) {
            $asambleistas_plenaria[$asambleista->id] = $asambleista->user->persona->primer_nombre
                . ' ' . $asambleista->user->persona->segundo_nombre
                . ' ' . $asambleista->user->persona->primer_apellido
                . ' ' . $asambleista->user->persona->segundo_apellido;
        }
        unset($asambleistas_plenaria[0]);
        $disco = "../storage/documentos/";

        return view('Agenda.discutir_punto_plenaria')
            ->with('disco', $disco)
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('asambleistas_plenaria', $asambleistas_plenaria)
            ->with('propuestas', $propuestas);
    }


    public function agregar_intervencion(Request $request, Redirector $redirect)
    {

        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();


        // ******* CUERPO DEL METODO
        $intervencion = new Intervencion();
        $intervencion->punto_id = $punto->id;
        $intervencion->asambleista_id = $request->asambleista_id;
        $intervencion->descripcion = $request->nueva_intervencion;
        $intervencion->save();
        // ******* CUERPO DEL METODO


        $propuestas = Propuesta::where('punto_id', '=', $punto->id)->orderBy('pareja', 'ASC')->orderBy('ronda', 'ASC')->get();
        //remplazar esta busqueda con los asambleistas realmente presentes
        $presentes = Asambleista::where('id', '<', '6')->get();
        $asambleistas_plenaria[] = array();
        foreach ($presentes as $asambleista) {
            $asambleistas_plenaria[$asambleista->id] = $asambleista->user->persona->primer_nombre
                . ' ' . $asambleista->user->persona->segundo_nombre
                . ' ' . $asambleista->user->persona->primer_apellido
                . ' ' . $asambleista->user->persona->segundo_apellido;
        }
        unset($asambleistas_plenaria[0]);
        $disco = "../storage/documentos/";

        return view('Agenda.discutir_punto_plenaria')
            ->with('disco', $disco)
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('asambleistas_plenaria', $asambleistas_plenaria)
            ->with('propuestas', $propuestas);
    }


    public function seguimiento_peticion_plenaria(Request $request, Redirector $redirect)
    {
        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();
        $regresar = $request->regresar;

        // ******* CUERPO DEL METODO
        $id_peticion = $punto->peticion->id;


        $peticion = Peticion::where('id', '=', $id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
        // ******* CUERPO DEL METODO

        $disco = "../storage/documentos/";
        return view('Agenda.seguimiento_peticion_plenaria')
            ->with('disco', $disco)
            ->with('agenda', $agenda)
            ->with('punto', $punto)
            ->with('regresar', $regresar)
            ->with('peticion', $peticion);

    }


    public function retirar_punto_plenaria(Request $request, Redirector $redirect)
    {


        // ******* CUERPO DEL METODO
        $punto = Punto::where('id', '=', $request->id_punto)->first();
        $punto->activo = '0';
        $punto->retirado = '1';
        $punto->save();
        //$peticion = Peticion::where('id', '=', $punto->peticion_id)->first();
        //$peticion->estado_peticion_id = EstadoPeticion::where('estado', '=', 'jd')->first()->id;

        // ******* CUERPO DEL METODO


        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $puntos = Punto::where('agenda_id', '=', $agenda->id)->orderBy('numero', 'ASC')->get();
        $actualizado = 0;
        return view('Agenda.listado_puntos_plenaria')
            ->with('actualizado', $actualizado)
            ->with('agenda', $agenda)
            ->with('puntos', $puntos);
    }

    public function resolver_punto_plenaria(Request $request, Redirector $redirect)
    {


        // ******* CUERPO DEL METODO
        $punto = Punto::where('id', '=', $request->id_punto)->first();
        $punto->activo = '0';
        $punto->save();
        $peticion = Peticion::where('id', '=', $punto->peticion_id)->first();
        $peticion->estado_peticion_id = EstadoPeticion::where('estado', '=', 'rs')->first()->id;
        $peticion->resuelto = '1';
        $peticion->agendado = '0';
        $peticion->asignado_agenda = '0';
        $peticion->comision = '0';
        $peticion->save();


        // ******* CUERPO DEL METODO


        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $puntos = Punto::where('agenda_id', '=', $agenda->id)->orderBy('numero', 'ASC')->get();
        $actualizado = 0;
        return view('Agenda.listado_puntos_plenaria')
            ->with('actualizado', $actualizado)
            ->with('agenda', $agenda)
            ->with('puntos', $puntos);
    }


    public function fijar_puntos(Request $request, Redirector $redirect)
    {

        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $puntos = Punto::where('agenda_id', '=', $agenda->id)->orderBy('numero', 'ASC')->get();


        // ******* CUERPO DEL METODO
        $agenda->fijada = '1';
        $agenda->save();
        // ******* CUERPO DEL METODO
        $actualizado = 0;
        return view('Agenda.listado_puntos_plenaria')
            ->with('actualizado', $actualizado)
            ->with('agenda', $agenda)
            ->with('puntos', $puntos);
    }


    public function nuevo_orden_plenaria(Request $request, Redirector $redirect)
    {
        //dd();
        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        $punto = Punto::where('id', '=', $request->id_punto)->first();
        $actualizado = 0;

        if ($request->restar == 1) {
            $punto_anterior = Punto::where('agenda_id', '=', $agenda->id)->where('numero', '=', ($punto->numero - 1))->first();
            if ($punto_anterior) {
                $punto->numero = $punto->numero - 1;
                $punto->romano = $this->getRomanNumerals($punto->numero);
                $punto->save();
                $punto_anterior->numero = $punto_anterior->numero + 1;
                $punto_anterior->romano = $this->getRomanNumerals($punto_anterior->numero);
                $punto_anterior->save();
                $actualizado = $punto->id;
            }

        } else {
            $punto_siguiente = Punto::where('agenda_id', '=', $agenda->id)->where('numero', '=', ($punto->numero + 1))->first();
            if ($punto_siguiente) {
                $punto->numero = $punto->numero + 1;
                $punto->romano = $this->getRomanNumerals($punto->numero);
                $punto->save();
                $punto_siguiente->numero = $punto_siguiente->numero - 1;
                $punto_siguiente->romano = $this->getRomanNumerals($punto_siguiente->numero);
                $punto_siguiente->save();
                $actualizado = $punto->id;
            }
        }


        $puntos = Punto::where('agenda_id', '=', $agenda->id)->orderBy('numero', 'ASC')->get(); // Primero ordenar por el estado, despues los estados
        //$peticiones = Peticion::where('asignado_agenda','=',1)->orderBy('created_at','ASC')->firstOrFail(); // Primero ordenar por el estado, despues los estados

        return view('Agenda.listado_puntos_plenaria')
            ->with('actualizado', $actualizado)
            ->with('agenda', $agenda)// a que agenda del viernes agendare este punto
            ->with('puntos', $puntos);
    }

    public function consultar_agendas_vigentes()
    {
        $agendas = Agenda::where('vigente','=','1')->orderBy('created_at', 'ASC')->get();
        //$puntos = Punto::all();
        return view('Agenda.consultar_agendas_vigentes')
        ->with('agendas',$agendas);
    }

    public function detalles_punto_agenda(Request $request)
    {
        $id_peticion = $request->id_peticion;
        $disco = "../storage/documentos/";

        $peticion = Peticion::where('id', '=', $id_peticion)->firstOrFail();
        return view('Agenda.detalles_punto_agenda')
            ->with('disco', $disco)
            ->with('peticion', $peticion);
    }


    public function agregar_asambleistas_sesion(Request $request){
        //dd($request->all());
        $id_asambleistas = $request->get("asambleistas");
        $agenda = Agenda::where('id', '=', $request->id_agenda)->first();
        //$comision = Comision::find($request->get("comision_id"));
        //dd($asambleistas);

        foreach ($id_asambleistas as $id_asambleista) {
            $ingresado  = Asistencia::where('agenda_id','=',$agenda->id)->where('asambleista_id','=',$id_asambleista)->count();
                if ($ingresado == 0) {
                    $asambleista_dato = Asambleista::where('id','=',$id_asambleista)->first();
                    $asistencia = new Asistencia();
                    $asistencia->agenda_id = $agenda->id; //************
                    $asistencia->asambleista_id = $asambleista_dato->id; //************
                    $asistencia->estado_asistencia_id = 3; // estado normal de asistencia es 3 
                    $asistencia->entrada = Carbon::now();

                    $propietarios = Asistencia::join("asambleistas", "asambleistas.id", "=", "asistencias.asambleista_id")
                                            ->where('asistencias.agenda_id','=',$agenda->id)
                                            ->where('asambleistas.facultad_id','=',$asambleista_dato->facultad_id)
                                            ->where('asambleistas.sector_id','=',$asambleista_dato->sector_id)
                                            ->count();
                    //si hay dos personas , las siguientes 2 solo pueden ser suplentes los
                    //cambios entre suplente y propietario se hacen en otra pantalla
                    if ($propietarios <= 1) {   
                        $asistencia->propietario = 1;
                    } else {
                        $asistencia->propietario = 0;
                    }

                    $asistencia->save();
                }
                else{
                        //dd("ya estaba");
                }
        }

        
                                    //dd($propietarios);

        //$request->session()->flash("success", "Asambleista(s) agregado(s) con exito " .$cargo->id);
        $request->session()->flash("success", "Asambleista(s) agregado(s) con exito ");

        //$agenda = Agenda::where('id', '=', $request->agenda_id)->first();
        $periodo_activo = Periodo::where('activo','=','1')->first();

        $array_asambleistas_sesion = Asistencia::where('agenda_id','=',$agenda->id)->pluck('asambleista_id')->toArray();
        /*dd($asistencias);
        $array_asambleistas_sesion = array();
        foreach ($asistencias as $asistencia){
            array_push($array_asambleistas_sesion,$asistencia->asambleista_id);
        }
        */
        //dd($array_asambleistas_sesion);
        //remover del select los asambleistas ya ingresas
        $asambleistas = Asambleista::where('activo','=', 1)
            ->where('periodo_id','=',$periodo_activo->id)
            ->where('facultad_id','=','5')
            ->whereNotIn('id',$array_asambleistas_sesion)
            ->get();

        $ultimos_ingresos  = Asistencia::where('agenda_id','=',$agenda->id)->orderBy('created_at', 'DESC')->take(5)->get();
        //dd($array_asambleistas_sesion);
        return view('Agenda.sala_sesion_plenaria')
            ->with('agenda', $agenda)
            ->with('asambleistas', $asambleistas)
            ->with('ultimos_ingresos', $ultimos_ingresos);
    }




        

}
