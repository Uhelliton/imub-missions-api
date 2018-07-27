<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_licao', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');

            $table->integer('curso_id', false)->unsigned();
            $table->foreign('curso_id')
                  ->references('id')
                  ->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_licao');
    }
}
