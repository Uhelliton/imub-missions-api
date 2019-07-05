<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_bairro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);

            $table->integer('cidade_id', false)->unsigned();
            $table->foreign('cidade_id')
                  ->references('id')
                  ->on('ms_cidade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_bairro');
    }
}
