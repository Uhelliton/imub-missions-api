<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_categoria_produto', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->string('nome');

            $table->integer('setor_id', false);
            $table->foreign('setor_id')
                  ->references('id')
                  ->on('lab_setor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_categoria_produto');
    }
}
