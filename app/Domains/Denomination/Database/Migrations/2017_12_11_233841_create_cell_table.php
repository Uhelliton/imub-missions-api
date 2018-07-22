<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celula', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);

            $table->integer('lider_id', false)->unsigned();
            $table->foreign('lider_id')
                  ->references('id')
                  ->on('membro');

            $table->integer('auxiliar_id', false)->unsigned()->nullable();
            $table->foreign('auxiliar_id')
                  ->references('id')
                  ->on('membro');

            $table->string('dia',  7);
            $table->time('horario');
            $table->char('status', 1); // [A] Ativa | [C] Cancelada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('celula');
    }
}
