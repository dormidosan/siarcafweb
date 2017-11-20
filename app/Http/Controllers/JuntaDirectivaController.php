<?php

namespace App\Http\Controllers;

use App\Presente;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Routing\Redirector;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Peticion;
use App\Comision;
use App\Seguimiento;
use App\EstadoSeguimiento;
use App\Reunion;
use App\Cargo;


class JuntaDirectivaController extends Controller
{
    //
    public function trabajo_junta_directiva()
    {
        return view('jdagu.trabajo_junta_directiva');
    }


    public function listado_peticiones_jd()
    {

        //$peticiones = Peticion::where('id','!=',0)->get(); //->paginate(10); para obtener todos los resultados  o null
        $peticiones = Peticion::where('id', '!=', 0)->orderBy('estado_peticion_id', 'ASC')->orderBy('updated_at', 'ASC')->get();

        return view('jdagu.listado_peticiones_jd')
            ->with('peticiones', $peticiones);
    }

    public function listado_reuniones_jd()
    {

        //$peticiones = Peticion::where('id','!=',0)->get(); //->paginate(10); para obtener todos los resultados  o null
        $reuniones = Reunion::where('id', '!=', 0)->where('comision_id', '=', '1')->orderBy('created_at', 'DESC')->get();

        return view('jdagu.listado_reuniones_jd')
            ->with('reuniones', $reuniones);
    }

    public function seguimiento_peticion_jd(Request $request, Redirector $redirect)
    {

        $id_peticion = $request->id_peticion;
        $disco = "../storage/documentos/";

        $peticion = Peticion::where('id', '=', $id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
        //dd($peticion);
        return view('jdagu.seguimiento_peticion_individual_jd')
            ->with('disco', $disco)
            ->with('peticion', $peticion);

    }


    public function agendar_plenaria(Request $request, Redirector $redirect)
    {

        //dd($request->all());
        $peticion = Peticion::where('id', '=', $request->id_peticion)->firstOrFail();
        $peticion->agendado = 1;
        $peticion->save();


        $reunion = Reunion::where('id', '=', $request->id_reunion)->firstOrFail();
        $comision = Comision::where('id', '=', $request->id_comision)->firstOrFail();
        $peticiones = Peticion::where('id', '!=', 0)->orderBy('estado_peticion_id', 'ASC')->orderBy('updated_at', 'ASC')->get();

        $todos_puntos = 1;
        return view('jdagu.reunion_jd')
            ->with('todos_puntos',$todos_puntos)
            ->with('reunion', $reunion)
            ->with('comision', $comision)
            ->with('peticiones', $peticiones);
    }

    public function iniciar_reunion_jd(Request $request, Redirector $redirect)
    {
        $peticiones = Peticion::where('id', '!=', 0)->orderBy('estado_peticion_id', 'ASC')->orderBy('updated_at', 'ASC')->get(); // Primero ordenar por el estado, despues los estados ordenarlo por fechas

        $reunion = Reunion::where('id', '=', $request->id_reunion)->firstOrFail();
        $reunion->activa = '1';
        $reunion->inicio = Carbon::now()->format('Y-m-d H:i:s');
        $reunion->save();
        $comision = Comision::where('id', '=', $request->id_comision)->firstOrFail();

        $todos_puntos = 1;
        return view('jdagu.reunion_jd')
            ->with('todos_puntos',$todos_puntos)
            ->with('reunion', $reunion)
            ->with('comision', $comision)
            ->with('peticiones', $peticiones);
    }

    public function puntos_agendados(Request $request,Redirector $redirect){
        //dd();

        $peticiones = Peticion::where('agendado','=',1)->orderBy('estado_peticion_id','ASC')->orderBy('updated_at','ASC')->get(); // Primero ordenar por el estado, despues los estados ordenarlo por fechas
        
        $reunion = Reunion::where('id','=',$request->id_reunion)->firstOrFail();
        
        $comision = Comision::where('id','=',$request->id_comision)->firstOrFail();

        $todos_puntos = 2;
        return view('jdagu.reunion_jd')
        ->with('todos_puntos',$todos_puntos)
        ->with('reunion',$reunion)
        ->with('comision',$comision)
        ->with('peticiones',$peticiones);
    }

    /*
        public function reunion_jd(Request $request,Redirector $redirect){
            $peticiones = Peticion::where('id','!=',0)->orderBy('estado_peticion_id','ASC')->orderBy('updated_at','ASC')->get(); // Primero ordenar por el estado, despues los estados ordenarlo por fechas

            $reunion = Reunion::where('id','=',$request->id_reunion)->firstOrFail();
            $reunion->activa = '1';
            $reunion->save();
            $comision = Comision::where('id','=',$request->id_comision)->firstOrFail();

            return view('jdagu.reunion_jd')
            ->with('reunion',$reunion)
            ->with('comision',$comision)
            ->with('peticiones',$peticiones);
        }
    */
    public function asistencia_jd(Request $request)
    {
        $cargos = Cargo::where('comision_id', '=', $request->id_comision)->where('activo', '=', 1)->get();
        $reunion = Reunion::where('id', '=', $request->id_reunion)->firstOrFail();
        $comision = Comision::where('id', '=', $request->id_comision)->firstOrFail();
        //dd($cargos);
        return view('jdagu.asistencia_reunion_JD')
            ->with('cargos', $cargos)
            ->with('reunion', $reunion)
            ->with('comision', $comision);

    }

    public function registrar_asistencia(Request $request)
    {

        $presente = new Presente();
        $presente->cargo_id = $request->get("cargo");
        $presente->reunion_id = $request->get("reunion");
        $presente->entrada = Carbon::now();
        $presente->save();
        $request->session()->flash("success", "Asistencia registrada con exito");

        $cargos = Cargo::where('comision_id', '=', $request->comision)->where('activo', '=', 1)->get();
        $reunion = Reunion::where('id', '=', $request->reunion)->firstOrFail();
        $comision = Comision::where('id', '=', $request->comision)->firstOrFail();

        $asistencias = Presente::where('reunion_id', $request->get("reunion"))
            ->get();

        //dd($asistencia);
        return view('jdagu.asistencia_reunion_JD')
            ->with('cargos', $cargos)
            ->with('reunion', $reunion)
            ->with('comision', $comision)
            ->with('asistencias', $asistencias);

    }

    public function finalizar_reunion_jd(Request $request, Redirector $redirect)
    {

        //$cargos = Cargo::where('comision_id','=',$request->id_comision)->where('activo', '=', 1)->get();
        $reunion = Reunion::where('id', '=', $request->id_reunion)->firstOrFail();
        $reunion->activa = '0';
        $reunion->vigente = '0';
        $reunion->fin = Carbon::now()->format('Y-m-d H:i:s');
        $reunion->save();
        //$comision = Comision::where('id','=',$request->id_comision)->firstOrFail();
        //dd($cargos);
        $reuniones = Reunion::where('id', '!=', 0)->where('comision_id', '=', $request->id_comision)->orderBy('created_at', 'DESC')->get();

        return view('jdagu.listado_reuniones_jd')
            ->with('reuniones', $reuniones);

    }


    public function asignar_comision_jd(Request $request, Redirector $redirect)
    {
        $id_peticion = $request->id_peticion;
        $disco = "../storage/documentos/";

        $peticion = Peticion::where('id', '=', $id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
        $reunion = Reunion::where('id', '=', $request->id_reunion)->firstOrFail();
        $comision = Comision::where('id', '=', $request->id_comision)->firstOrFail();
        $comisiones = Comision::where('id', '!=', '1')->pluck('nombre', 'id');  // traer todas las comisiones menos la JD
        $seguimientos = Seguimiento::where('peticion_id', '=', $id_peticion)->where('activo', '=', 1)->get();

        return view('jdagu.lista_asignacion')
            ->with('comisiones', $comisiones)
            ->with('seguimientos', $seguimientos)
            ->with('reunion', $reunion)
            ->with('comision', $comision)
            ->with('peticion', $peticion);
    }

    public function enlazar_comision(Request $request, Redirector $redirect)
    {
        //dd($request->all());
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
            $peticion->comision = 1;

        }


        //$peticion->comisiones()->sync([$id_comision], false);  //$model->sync(array $ids, $detaching = true)
        //$peticion->comisiones()->attach($id_comision);

        //


        //$peticion = Peticion::where('id','=',$id_peticion)->firstOrFail(); //->paginate(10); para obtener todos los resultados  o null
        $comisiones = Comision::where('id', '!=', '1')->pluck('nombre', 'id');  // traer todas las comisiones menos la JD
        $seguimientos = Seguimiento::where('peticion_id', '=', $id_peticion)->where('activo', '=', 1)->get();

        return view('jdagu.lista_asignacion')
            ->with('comisiones', $comisiones)
            ->with('seguimientos', $seguimientos)
            ->with('peticion', $peticion);
    }


}
