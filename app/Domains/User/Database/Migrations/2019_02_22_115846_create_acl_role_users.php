<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAclRoleUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acl_funcao_usuario', function (Blueprint $table) {
            //$table->increments('id');

            $table->integer('usuario_id', false)->unsigned();
            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('acl_usuario');

            $table->integer('funcao_id', false)->unsigned();
            $table->foreign('funcao_id')
                  ->references('id')
                  ->on('acl_funcao');

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
        Schema::dropIfExists('acl_funcao_usuario');
    }
}
