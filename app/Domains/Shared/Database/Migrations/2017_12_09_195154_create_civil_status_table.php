<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCivilStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         INSERT INTO `igestao_dev`.`estado_civil` (`nome`) VALUES ('Casado');
         INSERT INTO `igestao_dev`.`estado_civil` (`nome`) VALUES ('Solteiro');
         INSERT INTO `igestao_dev`.`estado_civil` (`nome`) VALUES ('Viúvo');
         */
        Schema::create('estado_civil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_civil');
    }
}
