<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsambleistaComisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asambleista_comisiones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('comisiones_id');
            $table->unsignedInteger('asambleistas_id');
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->string('cargo', 15)->nullable();
			$table->timestamps();

            $table->index(["asambleistas_id"], 'fk_asambleista_comision_asambleistas1_idx');

            $table->index(["comisiones_id"], 'fk_asambleista_comision_comisiones1_idx');


            $table->foreign('comisiones_id', 'fk_asambleista_comision_comisiones1_idx')
                ->references('id')->on('comisiones')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('asambleistas_id', 'fk_asambleista_comision_asambleistas1_idx')
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
        Schema::drop('asambleista_comisiones');
    }
}
