<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro_funcao', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cargo_id', false)->unsigned();
            $table->foreign('cargo_id')
                  ->references('id')
                  ->on('cargo');

            $table->integer('membro_id', false)->unsigned();
            $table->foreign('membro_id')
                  ->references('id')
                  ->on('membro');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membro_funcao');
    }
}
