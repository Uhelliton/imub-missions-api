<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongregationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congregacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('cnpj', 14);
            $table->string('email', 60)->nullable();
            $table->string('telefone', 11)->nullable();
            $table->string('celular', 11)->nullable();

            $table->integer('pastor_id', false)->unsigned();
            $table->foreign('pastor_id')
                  ->references('id')
                  ->on('membro');

            $table->integer('tesoureiro_id', false)->unsigned()->nullable();
            $table->foreign('tesoureiro_id')
                  ->references('id')
                  ->on('membro');

            $table->integer('secretario_id', false)->unsigned()->nullable();
            $table->foreign('secretario_id')
                  ->references('id')
                  ->on('membro');


            $table->date('data_inauguracao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congregacao');
    }
}
