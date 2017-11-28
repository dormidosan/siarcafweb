<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Agenda;

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
    	dd($agenda);

        return view('Agenda.CrearSesionPlenaria')
        ->with('agendas', $agendas);
    }

}
