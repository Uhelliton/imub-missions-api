<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePjmTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pjm_equipe_membro', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('membro_id', false);
            $table->foreign('membro_id')
                  ->references('id')
                  ->on('pjm_membro');

            $table->integer('equipe_id', false);
            $table->foreign('equipe_id')
                  ->references('id')
                  ->on('pjm_equipe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pjm_equipe_membro');
    }
}
