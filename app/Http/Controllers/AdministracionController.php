<?php

namespace App\Http\Controllers;

use App\Asambleista;
use App\Facultad;
use App\Periodo;
use App\Persona;
use App\Rol;
use App\Sector;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;

class AdministracionController extends Controller
{
    //
    public function registrar_usuario()
    {
        $facultades = Facultad::all();
        $sectores = Sector::all();
        $tipos_usuario = Rol::all();
        return view("Administracion.RegistrarUsuarios", ["facultades" => $facultades, "sectores" => $sectores, "tipos_usuario" => $tipos_usuario]);
    }

    public function guardar_usuario(UsuarioRequest $request)
    {
        //Se crea un objeto de tipo persona y se asocia lo que se recibe del form a su respectiva variable,
        //una vez ingresado la nueva persona, ya se tiene acceso a todos sus datos.
        $persona = new Persona();
        $persona->primer_nombre = $request->get("primer_nombre");
        $persona->segundo_nombre = $request->get("segundo_nombre");
        $persona->primer_apellido = $request->get("primer_apellido");
        $persona->segundo_apellido = $request->get("segundo_apellido");
        $persona->dui = $request->get("dui");
        $persona->nit = $request->get("nit");
        //sentencia para agregar la foto
        $persona->afp = $request->get("afp");
        $persona->cuenta = $request->get("cuenta");
        $persona->save();

        $usuario = new User();
        $usuario->rol_id = $request->get("tipo_usuario");
        $usuario->persona_id = $persona->id;
        $usuario->name = $persona->primer_nombre . "." . $persona->primer_apellido;
        $usuario->password = bcrypt("ATB");
        $usuario->email = $request->get("correo");
        $usuario->activo = 1;
        $usuario->save();

        $periodo_activo = Periodo::where("activo", "=", 1)->first();
        //dd($periodo_activo);
        $asambleista = new Asambleista();
        $asambleista->user_id = $usuario->id;
        $asambleista->periodo_id = $periodo_activo->id;
        $asambleista->facultad_id = $request->get("facultad");
        $asambleista->sector_id = $request->get("sector");
        $asambleista->propietario = $request->get("propietario");

        $hoy = Carbon::now();
        $inicio_periodo = Carbon::createFromFormat("Y-m-d",$periodo_activo->inicio);

        if ($hoy > $inicio_periodo) {
            $asambleista->inicio = $hoy;
        } else {
            $asambleista->inicio = $inicio_periodo;
        }
        $asambleista->save();

        $request->session()->flash("success", "Usuario agregado con exito");
        return redirect()->route("mostrar_formulario_registrar_usuario");


    }
}
