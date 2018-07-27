<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormSubscriptionAndressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_inscricao_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('endereco')->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('referencia')->nullable();

            $table->integer('bairro_id', false)->unsigned();
            $table->foreign('bairro_id')
                  ->references('id')
                  ->on('bairro');

            $table->integer('cidade_id', false)->unsigned();
            $table->foreign('cidade_id')
                  ->references('id')
                  ->on('cidade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_inscricao_endereco');
    }
}
