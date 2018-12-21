<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtvExtraHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atv_extra_horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora_ini');
            $table->time('hora_fim');
            $table->integer('vagas');
            $table->double('valor', 10, 2);
            $table->string('user');
            $table->unsignedInteger('atv_extra_turma_id');
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
        Schema::dropIfExists('atv_extra_horarios');
    }
}
