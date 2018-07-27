<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversao', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ficha_inscricao_id', false)->unsigned();
            $table->foreign('ficha_inscricao_id')
                ->references('id')
                ->on('ficha_inscricao');

            $table->integer('local_id', false)->unsigned();
            $table->foreign('local_id')
                  ->references('id')
                  ->on('conversao_local');

            $table->date('data_decisao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversao');
    }
}
