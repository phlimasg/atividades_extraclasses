<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsperasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esperas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('aluno_id');
            $table->bigInteger('atv_extra_turma_id');
            $table->string('user');                       
            $table->foreign('atv_extra_turma_id')
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
        Schema::dropIfExists('esperas');
    }
}
