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
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('periodos_id');
            $table->string('facultad', 25)->nullable();
            $table->string('sector', 15)->nullable();
            $table->string('propietario', 10)->nullable();
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->integer('activo')->nullable();
			$table->timestamps();

            $table->index(["users_id"], 'fk_asambleistas_users1_idx');

            $table->index(["periodos_id"], 'fk_asambleistas_periodos1_idx');


            $table->foreign('users_id', 'fk_asambleistas_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('periodos_id', 'fk_asambleistas_periodos1_idx')
                ->references('id')->on('periodos')
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
        Schema::drop('asambleistas');
    }
}
