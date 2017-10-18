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
        $comisiones = Comision::where("activa","=",1)->get();
        //se obtienen todos los asambleistas
        //$asambleistas = DB::table('cargos')->join('asambleistas','cargos.asambleista_id','=','asambleistas.id')->where('asambleistas.activo','=',1)->get();
        $asambleistas = Cargo::all();

        return view("Asambleistas.ListadoAsambleistasComision",['comisiones'=>$comisiones, 'asambleistas'=>$asambleistas]);
    }
}
