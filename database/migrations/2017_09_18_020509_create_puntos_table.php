<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('agendas_idagenda');
            $table->unsignedInteger('peticiones_id');
            $table->string('descripcion', 45)->nullable();
            $table->char('romano', 4)->nullable();
            $table->smallInteger('numero')->nullable();
			$table->timestamps();
			
            $table->index(["peticiones_id"], 'fk_puntos_peticiones1_idx');

            $table->index(["agendas_idagenda"], 'fk_puntos_agendas1_idx');


            $table->foreign('agendas_idagenda', 'fk_puntos_agendas1_idx')
                ->references('idagenda')->on('agendas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('peticiones_id', 'fk_puntos_peticiones1_idx')
                ->references('id')->on('peticiones')
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
        Schema::drop('puntos');
    }
}
