<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePjmTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pjm_equipe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cor_hexadecimal');

            $table->integer('lider_id', false)->unsigned()->unsigned();
            $table->foreign('lider_id')
                  ->references('id')
                  ->on('pjm_membro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pjm_equipe');
    }
}
