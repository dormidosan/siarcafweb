<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeticionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticiones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('codigo', 10)->nullable();
            $table->string('nombre', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->string('peticionario', 45)->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('correo', 45)->nullable();
            $table->boolean('resuelto')->nullable();
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
        Schema::drop('peticiones');
    }
}
