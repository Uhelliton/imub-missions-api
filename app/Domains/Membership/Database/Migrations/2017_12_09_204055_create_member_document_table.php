<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf', 11)->unique()->nullable();
            $table->string('rg', 10)->unique()->nullable();

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
        Schema::dropIfExists('member_document');
    }
}
