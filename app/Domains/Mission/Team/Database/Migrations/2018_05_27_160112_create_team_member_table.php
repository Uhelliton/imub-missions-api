<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_equipe_membro', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('membro_id', false)->unsigned();
            $table->foreign('membro_id')
                  ->references('id')
                  ->on('ms_membro');

            $table->integer('equipe_id', false)->unsigned();
            $table->foreign('equipe_id')
                  ->references('id')
                  ->on('ms_equipe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_equipe_membro');
    }
}
