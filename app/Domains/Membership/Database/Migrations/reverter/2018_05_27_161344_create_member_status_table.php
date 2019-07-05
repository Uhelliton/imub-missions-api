<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        INSERT INTO `igestao_dev`.`membro_status` (`tipo`) VALUES ('Ativo');
        INSERT INTO `igestao_dev`.`membro_status` (`tipo`) VALUES ('Inativo');
        INSERT INTO `igestao_dev`.`membro_status` (`tipo`) VALUES ('Falecido');
         */
        Schema::create('membro_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membro_status');
    }
}
