<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('estado_seguimientos')->insert(array (
		'estado'  => 'no discutido',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('estado_seguimientos')->insert(array (
		'estado'  => 'discutido',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

        \DB::table('estado_seguimientos')->insert(array (
		'estado'  => 'no resuelto',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('estado_seguimientos')->insert(array (
		'estado'  => 'resuelto',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('estado_seguimientos')->insert(array (
		'estado'  => 'resuelto con dictamen',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		




        \DB::table('estado_peticiones')->insert(array (
		'estado'  => 'Junta Directiva',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('estado_peticiones')->insert(array (
		'estado'  => 'En comision',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('estado_peticiones')->insert(array (
		'estado'  => 'Agendado AGU',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('estado_peticiones')->insert(array (
		'estado'  => 'resuelto',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('estado_peticiones')->insert(array (
		'estado'  => 'resuelto con acuerdo',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));




		\DB::table('parametros')->insert(array (
		'parametro'  => 'iva',
		'valor'  => '0.13',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));


		\DB::table('parametros')->insert(array (
		'parametro'  => 'porcentaje_asistencia',
		'valor'  => '0.80',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('parametros')->insert(array (
		'parametro'  => 'renta',
		'valor'  => '0.17',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('parametros')->insert(array (
		'parametro'  => 'valor_dieta',
		'valor'  => '25.15',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));












    }
}
