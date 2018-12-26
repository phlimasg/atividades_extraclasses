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
            $table->string('user');
            $table->unsignedInteger('turmas_id');
            $table->unsignedInteger('atv_extra_turma_id');
            $table->foreign('atv_extra_turma_id')
                ->references('id')
                ->on('atv_extra_turmas')
                ->onDelete('cascade');
            $table->foreign('turmas_id')
                ->references('id')
                ->on('turmas')
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
