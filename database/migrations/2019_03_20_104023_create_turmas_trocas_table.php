<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTrocasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas_trocas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('aluno_id');
            $table->string('user');
            $table->unsignedInteger('turma_origem');
            $table->unsignedInteger('turma_destino');
            $table->foreign('turma_origem')
                ->references('id')
                ->on('atv_extra_turmas')
                ->onDelete('cascade');
            $table->foreign('turma_destino')
                ->references('id')
                ->on('atv_extra_turmas')
                ->onDelete('cascade');            
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
        Schema::dropIfExists('turmas_trocas');
    }
}
