<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_equipe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cor_hexadecimal', 10);

            $table->integer('lider_id', false)->unsigned();
            $table->foreign('lider_id')
                  ->references('id')
                  ->on('ms_membro');

            $table->integer('projeto_id', false)->unsigned();
            $table->foreign('projeto_id')
                  ->references('id')
                  ->on('ms_projeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_equipe');
    }
}
