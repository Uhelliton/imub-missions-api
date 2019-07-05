<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_cidade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);

            $table->integer('estado_id', false)->unsigned();
            $table->foreign('estado_id')
                  ->references('id')
                  ->on('estado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_cidade');
    }
}
