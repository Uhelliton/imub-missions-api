<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongregationEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function upx()
    {
        Schema::create('congregacao_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cep', 9)->nullable();
            $table->char('estado', 2);
            $table->string('cidade', 60);
            $table->string('bairro', 50)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('referencia')->nullable();

            $table->integer('congregacao_id', false)->unsigned();
            $table->foreign('congregacao_id')
                  ->references('id')
                  ->on('congregacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congregacao_endereco');
    }
}
