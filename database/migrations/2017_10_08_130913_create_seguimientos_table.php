<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('peticion_id');
            $table->unsignedInteger('comision_id')->nullable();
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->boolean('activo')->nullable();
            $table->boolean('agendado')->nullable();

            $table->index(["comision_id"], 'fk_seguimientos_comisiones1_idx');

            $table->index(["peticion_id"], 'fk_seguimientos_peticiones1_idx');


            $table->foreign('peticion_id', 'fk_seguimientos_peticiones1_idx')
                ->references('id')->on('peticiones')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('comision_id', 'fk_seguimientos_comisiones1_idx')
                ->references('id')->on('comisiones')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seguimientos');
    }
}
