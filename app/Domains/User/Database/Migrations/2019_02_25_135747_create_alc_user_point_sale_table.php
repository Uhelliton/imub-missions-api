<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlcUserPointSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alc_ponto_venda_usuario', function (Blueprint $table) {
            $table->integer('usuario_id', false);
            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('acl_usuario');

            $table->integer('ponto_venda_id', false);
            $table->foreign('ponto_venda_id')
                 ->references('id')
                  ->on('ponto_venda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alc_ponto_venda_usuario');
    }
}
