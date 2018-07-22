<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberAndressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cep', 9)->nullable();
            $table->char('estado', 2);
            $table->string('cidade', 60);
            $table->string('bairro', 50)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('referencia')->nullable();

            $table->integer('membro_id', false)->unsigned();
            $table->foreign('membro_id')
                  ->references('id')
                  ->on('membro')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_andress');
    }
}
