<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Peticion;
use App\Punto;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function consultar_agendas_vigentes()
    {
        $agendas_vigentes = Agenda::where("vigente", 1)->orderBy("created_at", "ASC")->get();
        $puntos = Punto::all();
        return view("Agenda.consultar_agendas_vigentes", ["agendas_vigentes" => $agendas_vigentes, "puntos" => $puntos]);
    }

    public function detalles_punto_agenda_vigente(Request $request)
    {
        $id_peticion = $request->id_peticion;
        $disco = "../storage/documentos/";

        $peticion = Peticion::where('id', '=', $id_peticion)->firstOrFail();
        return view('Agenda.detalles_punto_agenda_vigente')
            ->with('disco', $disco)
            ->with('peticion', $peticion);
    }
}
