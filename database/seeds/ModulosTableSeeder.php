<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Modulos Padres
        //1
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Buscar documento',
            'url'  => 'busqueda',
            'icono'  => 'fa fa-book',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //2
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Comisiones',
            'icono'  => 'glyphicon glyphicon-equalizer',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //3
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Agenda',
            'icono'  => 'fa fa-files-o',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //4
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Asambleistas',
            'icono'  => 'fa fa-users',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //5
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Reporteria',
            'icono'  => 'glyphicon glyphicon-duplicate',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //6
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Descargar Plantillas',
            'modulo_padre' => '5',
            'icono'  => 'fa-dot-circle-o',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //7
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Reportes',
            'icono'  => 'fa-dot-circle-o',
            'modulo_padre' => '5',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //8
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Peticiones',
            'icono'  => 'glyphicon glyphicon-envelope',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //9
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Junta Directiva',
            'icono'  => 'glyphicon glyphicon-briefcase',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //10
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Administracion',
            'icono'  => 'glyphicon glyphicon-wrench',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //11
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Gestionar Usuarios',
            'icono'  => 'glyphicon glyphicon-wrench',
            'modulo_padre' => '10',
            'tiene_hijos' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        //Modulos Hijos
        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Crear Comision',
            'url' => 'comisiones',
            'modulo_padre' => '2',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Administrar Comisiones',
            'url' => 'administrar_comisiones',
            'modulo_padre' => '2',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Consultar agenda vigente',
            'url' => 'consultar_agendas_vigentes',
            'modulo_padre' => '3',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Historial de Agendas',
            'url' => 'historial_agendas',
            'modulo_padre' => '3',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Listado de Asambleistas',
            'url' => 'listado_asambleistas_facultad',
            'modulo_padre' => '4',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Asambleistas por Comision',
            'url' => 'listado_asambleistas_comision',
            'modulo_padre' => '4',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Asambleistas de JD',
            'url' => 'listado_asambleistas_junta',
            'modulo_padre' => '4',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Acuerdos',
            'url' => 'plantilla_actas',
            'modulo_padre' => '6',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Actas JD',
            'url' => '/',
            'modulo_padre' => '6',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Actas AGU',
            'url' => '/',
            'modulo_padre' => '6',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Dictamenes',
            'url' => '/',
            'modulo_padre' => '6',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Permisos de Inasistencia',
            'url' => '/',
            'modulo_padre' => '6',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            //'nombre_modulo'  => 'Listado de permisos de sesion plenaria temporales',
            'nombre_modulo'  => 'Permisos Temporales',
            'url' => 'Reporte_permisos_temporales',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            //'nombre_modulo'  => 'Listado de permisos de sesión plenaria permanentes',
            'nombre_modulo'  => 'Permisos Permanentes',
            'url' => 'Reporte_permisos_permanentes',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            //'nombre_modulo'  => 'Listado de asistencia de asambleístas a sesión plenaria',
            'nombre_modulo'  => 'Asistencia a plenarias',
            'url' => 'Reporte_asistencias_sesion_plenaria',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Bitacora Correspondencia',
            'url' => 'Reporte_bitacora_correspondencia',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Planilla de Dietas',
            'url' => 'Reporte_planilla_dieta',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Consolidados de renta',
            'url' => 'Reporte_consolidados_renta',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Constancias de renta',
            'url' => 'Reporte_constancias_renta',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Convocatorias',
            'url' => 'Reporte_Convocatorias',
            'modulo_padre' => '7',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Registrar Peticiones',
            'url' => 'RegistrarPeticion',
            'modulo_padre' => '8',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Monitoreo Peticion',
            'url' => 'monitoreo_peticion',
            'modulo_padre' => '8',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Trabajo JD',
            'url' => 'trabajo_junta_directiva',
            'modulo_padre' => '9',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Parametros',
            'url' => 'parametros',
            'modulo_padre' => '10',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Plantillas',
            'url' => 'gestionar_plantillas',
            'modulo_padre' => '10',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Administracion Usuarios',
            'url' => 'GestionarUsuarios',
            'modulo_padre' => '11',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Registrar Usuarios',
            'url' => 'registrar_usuario',
            'modulo_padre' => '11',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Gestionar Perfiles',
            'url' => 'gestionar_perfiles',
            'modulo_padre' => '11',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));

        \DB::table('modulos')->insert(array (
            'nombre_modulo'  => 'Periodo AGU',
            'url' => 'periodos_agu',
            'modulo_padre' => '10',
            'icono'  => 'fa fa-dot-circle-o',
            'tiene_hijos' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));







    }
}
