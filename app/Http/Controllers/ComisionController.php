<?php

namespace App\Http\Controllers;

use App\Clases\Mensaje;
use App\Comision;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ComisionRequest;
;

class ComisionController extends Controller
{
    public function mostrar_comisiones(){
        //se obtienen todas las comisiones en orden alfabetico
        //$comisiones = Comision::all();
        $comisiones = Comision::orderBy("nombre","asc")->get();
        return view("Comisiones.CrearComision",['comisiones'=>$comisiones]);
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
