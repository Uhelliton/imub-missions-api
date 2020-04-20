<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);

            $table->integer('sexo_id', false)->unsigned();
            $table->foreign('sexo_id')
                  ->references('id')
                  ->on('sexo');

            $table->date('data_nascimento')->nullable();
            $table->string('telefone', 11)->nullable();
            $table->string('celular', 11)->nullable();
            $table->string('email', 60)->nullable();

            $table->integer('membro_tipo_id', false)->unsigned(); // Gongregado || Membro
            $table->foreign('membro_tipo_id')
                  ->references('id')
                  ->on('membro_tipo');

            $table->integer('estado_civil_id', false)->unsigned();
            $table->foreign('estado_civil_id')
                  ->references('id')
                  ->on('estado_civil');

            $table->integer('nivel_escolaridade_id', false)->unsigned()->nullable();
            $table->foreign('nivel_escolaridade_id')
                  ->references('id')
                  ->on('nivel_escolaridade');

            $table->integer('cargo_id', false)->unsigned()->nullable();
            $table->foreign('cargo_id')
                  ->references('id')
                  ->on('cargo');

            $table->date('data_conversao')->nullable();
            $table->date('data_batismo')->nullable();
            $table->string('filiacao_pai', 60)->nullable();
            $table->string('filiacao_mae', 60)->nullable();


            $table->integer('membro_status_id', false)->unsigned();
            $table->foreign('membro_status_id')
                  ->references('id')
                  ->on('membro_status');

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
        Schema::dropIfExists('membro');
    }
}
