<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtvExtraTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atv_extra_turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao_turma');
            $table->unsignedInteger('atv_extra_id');
            $table->string('user');
            $table->foreign('atv_extra_id')
                ->references('id')
                ->on('atv_extras')
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
        Schema::dropIfExists('atv_extra_turmas');
    }
}
