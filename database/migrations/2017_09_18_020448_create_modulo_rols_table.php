<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_rols', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idmodulo_rol');
            $table->unsignedInteger('roles_id');
            $table->unsignedInteger('modulos_id');
			$table->timestamps();

            $table->index(["modulos_id"], 'fk_modulo_rol_modulos1_idx');

            $table->index(["roles_id"], 'fk_modulo_rol_roles1_idx');


            $table->foreign('roles_id', 'fk_modulo_rol_roles1_idx')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modulos_id', 'fk_modulo_rol_modulos1_idx')
                ->references('id')->on('modulos')
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
        Schema::drop('modulo_rols');
    }
}
