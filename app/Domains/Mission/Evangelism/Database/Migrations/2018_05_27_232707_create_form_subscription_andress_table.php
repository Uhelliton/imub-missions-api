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
        Schema::create('ms_ficha_inscricao_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rua')->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('referencia')->nullable();

            $table->integer('bairro_id', false)->unsigned();
            $table->foreign('bairro_id')
                  ->references('id')
                  ->on('ms_bairro');

            $table->integer('cidade_id', false)->unsigned();
            $table->foreign('cidade_id')
                  ->references('id')
                  ->on('ms_cidade');

            $table->integer('ficha_inscricao_id', false)->unsigned();
            $table->foreign('ficha_inscricao_id')
                ->references('id')
                ->on('ms_ficha_inscricao');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_ficha_inscricao_endereco');
    }
}
