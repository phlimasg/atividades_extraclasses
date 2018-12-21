<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtvExtraTurmasAutorizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atv_extra_turmas_autorizadas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_turma');
            $table->string('user');
            $table->unsignedInteger('atv_extra_horario_id');
            $table->foreign('atv_extra_horario_id')
                ->references('id')
                ->on('atv_extra_horarios')
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
        Schema::dropIfExists('atv_extra_turmas_autorizadas');
    }
}
