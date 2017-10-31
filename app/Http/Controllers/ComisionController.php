<?php

namespace App\Http\Controllers;

use App\Asambleista;
use App\Cargo;
use App\Clases\Mensaje;
use App\Comision;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ComisionRequest;
use Illuminate\Support\Facades\DB;

;

class ComisionController extends Controller
{
    public function mostrar_comisiones(){
        //se obtienen todas las comisiones en orden alfabetico
        //$comisiones = Comision::all();
        $comisiones = Comision::orderBy("nombre","asc")->get();
        return view("Comisiones.CrearComision",['comisiones'=>$comisiones]);
    }

    public function administrar_comisiones(){
        $comisiones = Comision::where("activa",1)->get();
        return view("Comisiones.AdministrarComision",['comisiones'=>$comisiones]);
    }

    public function administrar_integrantes_comision($id){
        $comision = Comision::find($id);

        //se obtiene todos los asambleistas que pertenecen a la comision
        $resultados = Cargo::where("comision_id","=",$id)->get();
        $asambleistas_ids = array();

        //array con los id de los asambleistas
        foreach ($resultados as $resultado)
            array_push($asambleistas_ids,$resultado->asambleista->id);


        //se obtienen todos aquellos asambleistas que no pertencezcan a la comision y mostrarlos en el select
        $asambleistas = Asambleista::join("periodos","asambleistas.periodo_id","=","periodos.id")
            ->where("asambleistas.activo", "=", 1)
            ->where("periodos.activo", "=", 1)
            ->whereNotIn("asambleistas.id",$asambleistas_ids)
            ->get();


        //obtener los integrantes de la comision y que esten activos en el periodo activo
        $integrantes = Cargo::join("asambleistas", "cargos.asambleista_id", "=", "asambleistas.id")
            ->join("periodos","asambleistas.periodo_id","=","periodos.id")
            ->where("cargos.comision_id", "=", $id)
            ->where("asambleistas.activo", "=", 1)
            ->where("periodos.activo", "=", 1)
            ->get();


        return view("Comisiones.AdministrarIntegrantes",["comision"=>$comision, "integrantes"=>$integrantes, "asambleistas"=>$asambleistas]);
    }

    public function crear_comision(ComisionRequest $request){

        $comision = new Comision();
        $comision->nombre = $request->get("nombre");
        $comision->permanente = 0; //0: transitoria, 1: permanente
        $comision->descripcion = $request->get("nombre");
        $comision->activa = 1;
        $comision->save();

        $request->session()->flash("success","Comision " . $comision->nombre ." agregada con exito");
        return redirect()->route("mostrar_comisiones");
    }

    public function actualizar_comision(Request $request)
    {
        if ($request->ajax()){
            //se obtiene la comision que coincida con el id enviado
            $comision = Comision::find($request->get("id"));
            $respuesta = new \stdClass();

            //se actualiza el estado de la comision, dependiendo de su previo estado
            if ($comision->activa==1){
                $comision->activa = 0;
                $respuesta->mensaje = (new Mensaje("Exito","Comision: ". $comision->nombre." establecida como inactiva","warning"))->toArray();
            }
            else{
                $comision->activa = 1;
                $respuesta->mensaje = (new Mensaje("Exito","Comision: ". $comision->nombre." establecida como activa","success"))->toArray();
            }

            //una vez efectuado el cambio, se realiza el cambio en la BD
            $comision->save();

            //se genera la respuesta json
            return new JsonResponse($respuesta);
        }
    }
}
