<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_curso', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ficha_inscricao_id', false)->unsigned();
            $table->foreign('ficha_inscricao_id')
                  ->references('id')
                  ->on('ms_ficha_inscricao');

            $table->integer('status_id', false)->unsigned();
            $table->foreign('status_id')
                  ->references('id')
                  ->on('curso_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso');
    }
}
