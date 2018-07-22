<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePjmFormSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pjm_ficha_inscricao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('endereco_rua', 100);
            $table->string('endereco_numero', 100);
            $table->string('telefone', 100);
            $table->char('seguir_cristo', 100);
            $table->char('desicao', 100);
            $table->char('celula', 100);

            //curso seguir crist
            //desição com cristo
            // celula

            //data_evangelistmo
            //Equipe_ID
            //Membros do grupo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pjm_ficha_inscricao');
    }
}
