<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('agendas_idagenda');
            $table->unsignedInteger('asambleistas_id');
            $table->dateTime('entrada')->nullable();
            $table->dateTime('salida')->nullable();
			$table->timestamps();

            $table->index(["asambleistas_id"], 'fk_asistencias_asambleistas1_idx');

            $table->index(["agendas_idagenda"], 'fk_asistencias_agendas1_idx');


            $table->foreign('agendas_idagenda', 'fk_asistencias_agendas1_idx')
                ->references('idagenda')->on('agendas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('asambleistas_id', 'fk_asistencias_asambleistas1_idx')
                ->references('id')->on('asambleistas')
                ->onDelete('no action')
                ->onUpdate('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asistencias');
    }
}
