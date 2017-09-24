<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('persona_id')->nullable();
            $table->unsignedInteger('roles_id')->nullable();
            $table->string('name', 15)->nullable();
            $table->string('password', 45)->nullable();
            $table->date('fecha_registro')->nullable();
            $table->date('ultimo_acceso')->nullable();
            $table->string('email')->unique();
			$table->integer('activo')->nullable();
			$table->rememberToken();
			$table->timestamps();
			
			$table->index(["persona_id"], 'fk_users_personas_idx');

            $table->index(["roles_id"], 'fk_users_roles1_idx');


            $table->foreign('persona_id', 'fk_users_personas_idx')
                ->references('id')->on('personas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('roles_id', 'fk_users_roles1_idx')
                ->references('id')->on('roles')
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
        Schema::drop('users');
    }
}
