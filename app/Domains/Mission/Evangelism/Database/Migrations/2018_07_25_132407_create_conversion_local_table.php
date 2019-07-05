<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversionLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        INSERT INTO `igestao_dev`.`ms_local_conversao` (`nome`) VALUES ('Célula');
        INSERT INTO `igestao_dev`.`ms_local_conversao` (`nome`) VALUES ('Culto de Rua');
        INSERT INTO `igestao_dev`.`ms_local_conversao` (`nome`) VALUES ('Curso Biblico');
        INSERT INTO `igestao_dev`.`ms_local_conversao` (`nome`) VALUES ('Evangelismo Casa');
         */
        Schema::create('ms_local_conversao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_local_conversao');
    }
}
