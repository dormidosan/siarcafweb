<?php

namespace App\Http\Controllers;

use App\Comision;
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

    public function crearComision(ComisionRequest $request){

        $comision = new Comision();
        $comision->nombre = $request->get("nombre");
        $comision->permanente = 0; //0: transitoria, 1: permanente
        $comision->descripcion = $request->get("nombre");
        $comision->activa = 1;
        $comision->save();

        $request->session()->flash("success","Comision " . $comision->nombre ." agregada con exito");
        return redirect()->route("mostrar_comisiones");

    }
}
