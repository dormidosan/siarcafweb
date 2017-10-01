<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeticionDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticion_documentos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('peticiones_id');
            $table->unsignedInteger('documentos_id');
            $table->dateTime('fecha_ingreso')->nullable();
			$table->timestamps();

            $table->index(["peticiones_id"], 'fk_peticion_documento_peticiones1_idx');

            $table->index(["documentos_id"], 'fk_peticion_documento_documentos1_idx');


            $table->foreign('peticiones_id', 'fk_peticion_documento_peticiones1_idx')
                ->references('id')->on('peticiones')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('documentos_id', 'fk_peticion_documento_documentos1_idx')
                ->references('id')->on('documentos')
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
        Schema::drop('peticion_documentos');
    }
}
