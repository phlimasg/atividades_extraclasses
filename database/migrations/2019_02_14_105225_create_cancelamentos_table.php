<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('aluno_id');                        
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
        Schema::dropIfExists('cancelamentos');
    }
}
