<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoInasistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_inasistencias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('asambleistas_id');
            $table->date('fecha_permiso')->nullable();
            $table->string('motivo', 45)->nullable();
			$table->timestamps();

            $table->index(["asambleistas_id"], 'fk_permiso_inasistencias_asambleistas1_idx');


            $table->foreign('asambleistas_id', 'fk_permiso_inasistencias_asambleistas1_idx')
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
        Schema::drop('permiso_inasistencias');
    }
}
