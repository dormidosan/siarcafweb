<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('puntos_id');
            $table->string('asambleista', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
			$table->timestamps();

            $table->index(["puntos_id"], 'fk_intervenciones_puntos1_idx');


            $table->foreign('puntos_id', 'fk_intervenciones_puntos1_idx')
                ->references('id')->on('puntos')
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
        Schema::drop('intervenciones');
    }
}
