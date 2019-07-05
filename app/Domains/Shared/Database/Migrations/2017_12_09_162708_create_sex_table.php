<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        INSERT INTO `igestao_dev`.`sexo` (`tipo`) VALUES ('Masculino');
        INSERT INTO `igestao_dev`.`sexo` (`tipo`) VALUES ('Feminino');
         */
        Schema::create('sexo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 15); // masculino | feminino
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexo');
    }
}
