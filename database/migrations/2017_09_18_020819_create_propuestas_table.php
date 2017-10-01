<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('puntos_id');
            $table->string('nombre_propuesta', 45)->nullable();
            $table->smallInteger('favor')->nullable();
            $table->smallInteger('contra')->nullable();
            $table->smallInteger('abstencion')->nullable();
            $table->smallInteger('nulo')->nullable();
            $table->smallInteger('ronda')->nullable();
			$table->timestamps();

            $table->index(["puntos_id"], 'fk_propuestas_puntos1_idx');


            $table->foreign('puntos_id', 'fk_propuestas_puntos1_idx')
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
        Schema::drop('propuestas');
    }
}
