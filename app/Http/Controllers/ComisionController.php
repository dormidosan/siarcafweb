<?php

namespace App\Http\Controllers;

use App\Comision;
use AppBundle\Controller\Clases\Mensaje;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ComisionController extends Controller
{
    public function mostrarComisiones(){
        //se obtienen todas las comisiones en orden alfabetico
        //$comisiones = Comision::all();
        $comisiones = Comision::orderBy("nombre","asc")->get();
        return view("Comisiones.CrearComision",['comisiones'=>$comisiones]);
    }

    public function crearComision(Request $request){
        if($request->ajax()){
            $comision = new Comision();
            $comision->nombre = $request->get("nombre");
            $comision->permanente = 0; //0: transitoria, 1: permanente
            $comision->descripcion = $request->get("nombre");
            $comision->activa = 1;
            //$comision->setCreatedAt(Carbon::now(new \DateTimeZone("America/El_Salvador")));
            $comision->save();

            /*$comision = Comision::orderBy("id")->get();
            $respuesta = new \stdClass();
            $html="";
            $html .= "<tr><td>".$comision->nombre."</td></tr>";
            $respuesta->htmlRow =  $html;
            return new JsonResponse($respuesta);*/
        }
    }
}
