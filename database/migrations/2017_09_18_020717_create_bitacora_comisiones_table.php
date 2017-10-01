<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraComisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_comisiones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('documentos_id');
            $table->unsignedInteger('comisiones_idcomision');
            $table->date('fecha')->nullable();
			$table->timestamps();

            $table->index(["comisiones_idcomision"], 'fk_bitacora_comision_comisiones1_idx');

            $table->index(["documentos_id"], 'fk_bitacora_comision_documentos1_idx');


            $table->foreign('documentos_id', 'fk_bitacora_comision_documentos1_idx')
                ->references('id')->on('documentos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('comisiones_idcomision', 'fk_bitacora_comision_comisiones1_idx')
                ->references('id')->on('comisiones')
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
        Schema::drop('bitacora_comisiones');
    }
}
