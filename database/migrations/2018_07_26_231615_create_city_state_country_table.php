<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityStateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->increments('id');
            $table->char('sigla', 2);
            $table->string('nome', 60);
        });

        Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->char('sigla', 2);
            $table->string('nome', 60);

            $table->integer('pais_id', false)->unsigned();
            $table->foreign('pais_id')
                ->references('id')
                ->on('pais');

        });

        Schema::create('cidade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);

            $table->integer('estado_id', false)->unsigned();
            $table->foreign('estado_id')
                ->references('id')
                ->on('estado');

        });

        Schema::create('bairro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);

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
        Schema::dropIfExists('bairro');
        Schema::dropIfExists('cidade');
        Schema::dropIfExists('estado');
        Schema::dropIfExists('pais');

    }
}
