<?php

namespace App\Http\Controllers;

use App\Asambleista;
use App\Cargo;
use App\Comision;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AsambleistaController extends Controller
{
    //
    public function asambleistas_comision(){

        //recuperar las comisiones que estan activas en el periodo vigente
        $comisiones = Comision::where("activa",1)->get();

        //Se genera un array con el id de las comisiones activas
        //$idComisiones  = Comision::where('activa' ,'=' ,1)->pluck('id')->toArray();

        //Se obtiene todos los cargos que pertenecen a una comision activa y que sea un asambleista activo
        //$cargos = Cargo::whereIn("comision_id",$idComisiones)->join("asambleistas","cargos.asambleista_id","=","asambleistas.id")->where("asambleistas.activo","=",1)->get();

        //se obtiene todos los asambleistas que pertenecen a una comision activa y que estos esten
        //activos
        $cargos = Cargo::join("asambleistas","cargos.asambleista_id","=","asambleistas.id")
            ->join("comisiones","cargos.comision_id","=","comisiones.id")
            ->where("asambleistas.activo","=",1)
            ->where("comisiones.activa","=",1)
            ->get();

        return view("Asambleistas.ListadoAsambleistasComision",['comisiones'=>$comisiones, 'cargos'=>$cargos]);

    }
}
