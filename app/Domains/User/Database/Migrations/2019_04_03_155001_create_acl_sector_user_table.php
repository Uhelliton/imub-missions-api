<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAclSectorUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acl_setor_usuario', function (Blueprint $table) {
            $table->integer('usuario_id', false);
            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('acl_usuario');

            $table->integer('setor_id', false);
            $table->foreign('setor_id')
                  ->references('id')
                  ->on('lab_setor');

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
        Schema::dropIfExists('acl_setor_usuario');
    }
}
