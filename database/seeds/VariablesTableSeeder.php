<?php

use Illuminate\Database\Seeder;

class VariablesTableSeeder extends Seeder {
	
	
	public function run()
	{

		\DB::table('tipo_documentos')->insert(array (
			'tipo'  => 'peticion'
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


		\DB::table('periodos')->insert(array (
		'nombre_periodo'  => '2013-2015',
		'inicio'  => '2013-06-02',
		'fin'  => '2015-06-02',
		'activo'  => '1'

		));
		
		\DB::table('periodos')->insert(array (
		'nombre_periodo'  => '2015-2017',
		'inicio'  => '2015-06-02',
		'fin'  => '2017-06-02',
		'activo'  => '1'

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
		'nombre'  => 'comision asociaciones',
		'permanente'  => '1',
		'descripcion'  => 'comision de creacion de asociaciones',
		'activa'  => '1'
		));
		
		\DB::table('comisiones')->insert(array (
		'nombre'  => 'comision reglamentos',
		'permanente'  => '1',
		'descripcion'  => 'comision de creacion de reglamentos',
		'activa'  => '1'
		));
		
		\DB::table('comisiones')->insert(array (
		'nombre'  => 'comision legislacion',
		'permanente'  => '0',
		'descripcion'  => 'comision de legislar la ues',
		'activa'  => '1'
		));
		
		\DB::table('comisiones')->insert(array (
		'nombre'  => 'comision presupuestos',
		'permanente'  => '0',
		'descripcion'  => 'comision de prespuesto y dinero',
		'activa'  => '0'
		));
		
	}
	
}
	
