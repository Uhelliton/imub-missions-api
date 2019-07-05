<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_ficha_inscricao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->tinyInteger('idade')->nullable();
            $table->string('telefone', 11)->nullable();

            $table->integer('sexo_id', false)->unsigned();
            $table->foreign('sexo_id')
                  ->references('id')
                  ->on('sexo');

            $table->boolean('curso')->nullable();
            $table->boolean('conversao')->nullable();
            $table->boolean('celula')->nullable();

            $table->integer('projeto_id', false)->unsigned();
            $table->foreign('projeto_id')
                  ->references('id')
                  ->on('ms_projeto');

            $table->integer('equipe_id', false)->unsigned();
            $table->foreign('equipe_id')
                  ->references('id')
                  ->on('ms_equipe');

            $table->string('membro_evangelismo');
            $table->text('observacao')->nullable();
            $table->date('data_evangelismo');
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
        Schema::dropIfExists('ms_ficha_inscricao');
    }
}
