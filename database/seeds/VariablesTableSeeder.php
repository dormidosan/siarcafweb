<?php

use Illuminate\Database\Seeder;


use Carbon\Carbon;

class VariablesTableSeeder extends Seeder {
	
	
	public function run()
	{

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'peticion'
		));

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'atestado'
		));

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'dictamen'
		));

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'acuerdo'
		));

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'acta'
		));

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'acta jd'
		));

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'bitacora'
		));


		\DB::table('periodos')->insert(array (
		'nombre_periodo'  => '2013-2015',
		'inicio'  => '2013-06-02',
		'fin'  => '2015-06-02',
		'activo'  => '0'
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));
		
		\DB::table('periodos')->insert(array (
		'nombre_periodo'  => '2015-2017',
		'inicio'  => '2015-06-02',
		'fin'  => '2017-06-02',
		'activo'  => '1'
		'created_at' => Carbon::now()->addSeconds(2)->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->addSeconds(2)->format('Y-m-d H:i:s')
		));

		\DB::table('roles')->insert(array (
		'nombre_rol'  => 'administrador'

		));
		
		\DB::table('roles')->insert(array (
		'nombre_rol'  => 'secretario'

		));
		
		\DB::table('roles')->insert(array (
		'nombre_rol'  => 'asambleista'

		));



		\DB::table('comisiones')->insert(array (
		'codigo'  => 'jda',
		'nombre'  => 'junta directiva',
		'permanente'  => '1',
		'descripcion'  => 'comision de JD',
		'activa'  => '1',
		'especial'=> '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));
		
		\DB::table('comisiones')->insert(array (
		'codigo'  => 'aso',
		'nombre'  => 'comision asociaciones',
		'permanente'  => '1',
		'descripcion'  => 'comision de creacion de asociaciones',
		'activa'  => '1',
		'especial'=> '0',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));
		
		\DB::table('comisiones')->insert(array (
		'codigo'  => 'reg',
		'nombre'  => 'comision reglamentos',
		'permanente'  => '1',
		'descripcion'  => 'comision de creacion de reglamentos',
		'activa'  => '1',
		'especial'=> '0',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));
		
		\DB::table('comisiones')->insert(array (
		'codigo'  => 'leg',
		'nombre'  => 'comision legislacion',
		'permanente'  => '0',
		'descripcion'  => 'comision de legislar la ues',
		'activa'  => '1',
		'especial'=> '0',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));
		
		\DB::table('comisiones')->insert(array (
		'codigo'  => 'pre',
		'nombre'  => 'comision presupuestos',
		'permanente'  => '0',
		'descripcion'  => 'comision de prespuesto y dinero',
		'activa'  => '0',
		'especial'=> '0',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));




		\DB::table('facultades')->insert(array (
		'nombre' => 'CIENCIAS Y HUMANIDADES',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'CIENCIAS AGRONOMICAS',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'CIENCIAS ECONOMICAS',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'ODONTOLOGIA',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'INGENIERIA  Y ARQUITECTURA',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'QUIMICA Y FARMACIA',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'MEDICINA',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'CIENCIAS NATURALES Y MATEMATICA',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'JURISPRUDENCIA Y CIENCIAS SOCIALES',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'MULTIDISCIPLINARIA DE OCCIDENTE',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'MULTIDISCIPLINARIA  PARACENTRAL',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('facultades')->insert(array (
		'nombre' => 'MULTIDISCIPLINARIA ORIENTAL',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('sectores')->insert(array (
		'nombre' => 'Estudiantil',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('sectores')->insert(array (
		'nombre' => 'Docente',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('sectores')->insert(array (
		'nombre' => 'Profesional no docente',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));
			
				
				
			
				
				
			
				
				
			
				
			
				
				
			





		// ------------------------------------------------------------------------ //
/*
		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre1 ',
		'segundo_nombre'  => 'nombre1',
		'primer_apellido'  => 'apellido1',
		'segundo_apellido'  => 'apellido1',
		'dui'  => '01610325-1',
		'nit'  => '0404-110993-101-1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre2 ',
		'segundo_nombre'  => 'nombre2',
		'primer_apellido'  => 'apellido2',
		'segundo_apellido'  => 'apellido2',
		'dui'  => '02610325-1',
		'nit'  => '0404-110993-101-2',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre3 ',
		'segundo_nombre'  => 'nombre3',
		'primer_apellido'  => 'apellido3',
		'segundo_apellido'  => 'apellido3',
		'dui'  => '03610325-1',
		'nit'  => '0404-110993-101-3',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre4 ',
		'segundo_nombre'  => 'nombre4',
		'primer_apellido'  => 'apellido4',
		'segundo_apellido'  => 'apellido4',
		'dui'  => '04610325-1',
		'nit'  => '0404-110993-101-4',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre5 ',
		'segundo_nombre'  => 'nombre5',
		'primer_apellido'  => 'apellido5',
		'segundo_apellido'  => 'apellido5',
		'dui'  => '05610325-1',
		'nit'  => '0404-110993-101-5',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre6 ',
		'segundo_nombre'  => 'nombre6',
		'primer_apellido'  => 'apellido6',
		'segundo_apellido'  => 'apellido6',
		'dui'  => '06610325-1',
		'nit'  => '0404-110993-101-6',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre7 ',
		'segundo_nombre'  => 'nombre7',
		'primer_apellido'  => 'apellido7',
		'segundo_apellido'  => 'apellido7',
		'dui'  => '07610325-1',
		'nit'  => '0404-110993-101-7',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre8 ',
		'segundo_nombre'  => 'nombre8',
		'primer_apellido'  => 'apellido8',
		'segundo_apellido'  => 'apellido8',
		'dui'  => '08610325-1',
		'nit'  => '0404-110993-101-8',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre9 ',
		'segundo_nombre'  => 'nombre9',
		'primer_apellido'  => 'apellido9',
		'segundo_apellido'  => 'apellido9',
		'dui'  => '09610325-1',
		'nit'  => '0404-110993-101-9',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('personas')->insert(array (
		'primer_nombre'  => 'nombre10 ',
		'segundo_nombre'  => 'nombre10',
		'primer_apellido'  => 'apellido10',
		'segundo_apellido'  => 'apellido10',
		'dui'  => '10610325-1',
		'nit'  => '0404-110993-101-0',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));



		// -------------------------------------------------------------------------------

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '1',
		'name'  => 'nombreusuario1',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail1@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '2',
		'name'  => 'nombreusuario2',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail2@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '3',
		'name'  => 'nombreusuario3',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail3@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '4',
		'name'  => 'nombreusuario4',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail4@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '5',
		'name'  => 'nombreusuario5',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail5@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '6',
		'name'  => 'nombreusuario6',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail6@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '7',
		'name'  => 'nombreusuario7',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail7@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '8',
		'name'  => 'nombreusuario8',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail8@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => '9',
		'name'  => 'nombreusuario9',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail9@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '1 ',
		'persona_id'  => '10',
		'name'  => 'nombreusuario10',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail10@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		// --------------------------------------------------------------------	

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 1',
		'periodo_id'  => '2',
		'facultad'  => ' Ingenieria',
		'sector'  => 'Estudiantil ',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('asambleistas')->insert(array (
		'user_id'  => '2 ',
		'periodo_id'  => '2',
		'facultad'  => ' Ingenieria',
		'sector'  => 'Estudiantil ',
		'propietario'  => '0',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 3',
		'periodo_id'  => '2',
		'facultad'  => ' Ingenieria',
		'sector'  => ' Docente',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 4',
		'periodo_id'  => '2',
		'facultad'  => ' Ingenieria',
		'sector'  => ' Personal no Docente',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 5',
		'periodo_id'  => '2',
		'facultad'  => 'Quimica y F ',
		'sector'  => 'Estudiantil ',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 6',
		'periodo_id'  => '2',
		'facultad'  => 'Quimica y F ',
		'sector'  => ' Docente',
		'propietario'  => '0',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => '7 ',
		'periodo_id'  => '2',
		'facultad'  => 'FMOCC ',
		'sector'  => 'Estudiantil',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 8',
		'periodo_id'  => '2',
		'facultad'  => 'FMOCC',
		'sector'  => 'Estudiantil ',
		'propietario'  => '0',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => '9 ',
		'periodo_id'  => '2',
		'facultad'  => ' Odontologia',
		'sector'  => ' Estudiantil',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		// ------------------------------------

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 5',
		'periodo_id'  => '1',
		'facultad'  => 'Quimica y F ',
		'sector'  => 'Estudiantil ',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2013, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2015, 6, 28, 0, 0, 0),
		'activo'  => '0',
		'created_at' => Carbon::create(2013, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 6',
		'periodo_id'  => '1',
		'facultad'  => 'Quimica y F ',
		'sector'  => ' Estudiantil',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2013, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2015, 6, 28, 0, 0, 0),
		'activo'  => '0',
		'created_at' => Carbon::create(2013, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => '7 ',
		'periodo_id'  => '1',
		'facultad'  => 'FMOCC ',
		'sector'  => 'Estudiantil',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2013, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2015, 6, 28, 0, 0, 0),
		'activo'  => '0',
		'created_at' => Carbon::create(2013, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => ' 8',
		'periodo_id'  => '1',
		'facultad'  => 'FMOCC',
		'sector'  => 'Estudiantil ',
		'propietario'  => '0',
		'inicio'  => Carbon::create(2013, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2015, 6, 28, 0, 0, 0),
		'activo'  => '0',
		'created_at' => Carbon::create(2013, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('asambleistas')->insert(array (
		'user_id'  => '9 ',
		'periodo_id'  => '1',
		'facultad'  => ' Odontologia',
		'sector'  => ' Estudiantil',
		'propietario'  => '1',
		'inicio'  => Carbon::create(2013, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2015, 6, 28, 0, 0, 0),
		'activo'  => '0',
		'created_at' => Carbon::create(2013, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));





*/


		
	}
	
}
	
