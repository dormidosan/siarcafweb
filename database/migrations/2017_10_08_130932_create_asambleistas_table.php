<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsambleistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asambleistas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('periodo_id');
            $table->unsignedInteger('user_id');
            $table->string('facultad', 35)->nullable();
            $table->string('sector', 20)->nullable();
            $table->string('propietario', 10)->nullable();
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->integer('activo')->nullable();
            $table->string('ruta', 50)->nullable();

            $table->index(["user_id"], 'fk_asambleistas_users1_idx');

            $table->index(["periodo_id"], 'fk_asambleistas_periodos1_idx');


            $table->foreign('user_id', 'fk_asambleistas_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('periodo_id', 'fk_asambleistas_periodos1_idx')
                ->references('id')->on('periodos')
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
        Schema::drop('asambleistas');
    }
}
