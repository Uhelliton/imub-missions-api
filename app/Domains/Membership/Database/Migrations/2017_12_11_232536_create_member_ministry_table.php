<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberMinistryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro_ministerio', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ministerio_id', false)->unsigned();
            $table->foreign('ministerio_id')
                  ->references('id')
                  ->on('ministerio');

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
        Schema::dropIfExists('membro_ministerio');
    }
}
