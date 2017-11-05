<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Carbon\Carbon;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $i=1;
        $p=1;
        $facultad = 1;
        $sector = 1 ;
    	for($j = 1 ; $j < 145 ; $j ++){

    	\DB::table('personas')->insert(array (
		'primer_nombre'  => $faker->firstName,
		'segundo_nombre'  => $faker->firstName,
		'primer_apellido'  => $faker->lastname,
		'segundo_apellido'  => $faker->lastname,
		'dui'  => $faker->unique()->ean8,
		'nit'  => $faker->unique()->isbn13,
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		\DB::table('users')->insert(array (
		'rol_id'  => '3 ',
		'persona_id'  => $j,
		'name'  => 'name_user'.$j,
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => $faker->freeEmail,
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));
/*
		switch ($j) {
			case 1:
				$facultad="CIENCIAS Y HUMANIDADES";
				$i=1;
				break;
			case 13:
				$facultad="CIENCIAS AGRONOMICAS";
				$i=1;
				break;
			case 25:
				$facultad="CIENCIAS ECONOMICAS";
				$i=1;
				break;
			case 37:
				$facultad="ODONTOLOGIA";
				$i=1;
				break;
			case 49:
				$facultad="INGENIERIA  Y ARQUITECTURA";
				$i=1;
				break;
			case 61:
				$facultad="QUIMICA Y FARMACIA";
				$i=1;
				break;
			case 73:
				$facultad="MEDICINA";
				$i=1;
				break;
			case 85:
				$facultad="CIENCIAS NATURALES Y MATEMATICA";
				$i=1;
				break;
			case 97:
				$facultad="JURISPRUDENCIA Y CIENCIAS SOCIALES";
				$i=1;
				break;
			case 109:
				$facultad="MULTIDISCIPLINARIA DE OCCIDENTE";
				$i=1;
				break;
			case 121:
				$facultad="MULTIDISCIPLINARIA  PARACENTRAL";
				$i=1;
				break;
			case 133:
				$facultad="MULTIDISCIPLINARIA ORIENTAL";
				$i=1;
				break;
			
		}
			switch ($i) {
				case 1:
					$sector = "Estudiantil";
					break;
				case 5:
					$sector = "Docente";
					break;
				case 9:
					$sector = "Personal no Docente";
					break;
				
			}
*/


       if ($i>12){
       	$i=1;
       	$facultad++;
       }

       switch ($i) {
				case 1:
					$sector = "1";
					break;
				case 5:
					$sector = "2";
					break;
				case 9:
					$sector = "3";
					break;
				
		}



		\DB::table('asambleistas')->insert(array (
		'user_id'  => $j,
		'periodo_id'  => '2',
		'facultad_id'  => $facultad,
		'sector_id'  => $sector,
		'propietario'  => $p,
		'inicio'  => Carbon::create(2015, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2017, 6, 28, 0, 0, 0),
		'activo'  => '1',
		'created_at' => Carbon::create(2015, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		
		if ($p == 1) {
			$p = 0;
			} else {
				$p = 1;
				}
		$i++;


    	}

// -----------------------------------------------------

    	$i=1;
        $p=1;
        $facultad = 1;
        $sector = 1 ;
    	for($j = 1 ; $j < 25 ; $j ++){

		if ($i>12){
       	$i=1;
       	$facultad++;
       }

       switch ($i) {
				case 1:
					$sector = "1";
					break;
				case 5:
					$sector = "2";
					break;
				case 9:
					$sector = "3";
					break;
				
		}

		\DB::table('asambleistas')->insert(array (
		'user_id'  => $j,
		'periodo_id'  => '1',
		'facultad_id'  => $facultad,
		'sector_id'  => $sector,
		'propietario'  => $p,
		'inicio'  => Carbon::create(2013, 6, 28, 0, 0, 0),
		'fin'     => Carbon::create(2015, 6, 28, 0, 0, 0),
		'activo'  => '0',
		'created_at' => Carbon::create(2013, 5, 1, 0, 0, 0),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));

		
		if ($p == 1) {
			$p = 0;
		} else {
			$p = 1;
		}
		$i++;


    	}


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
    	
    	\DB::table('users')->insert(array (
		'rol_id'  => '1 ',
		'persona_id'  => '1',
		'name'  => 'nombreusuario',
		'password'  => bcrypt('123456'),
		'fecha_registro'  => Carbon::now()->format('Y-m-d H:i:s'),
		'ultimo_acceso'  => Carbon::now()->format('Y-m-d H:i:s'),
		'email'  => 'mail1@ues.com',
		'activo'  => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		));





    }
}
