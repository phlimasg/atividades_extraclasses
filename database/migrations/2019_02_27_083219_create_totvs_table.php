<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RA')->unique();
            $table->string('NOME_ALUNO');
            $table->string('CARTEIRINHA')->nullable();
            $table->string('SEXO')->nullable();
            $table->string('ANO')->nullable();
            $table->string('TURMA')->nullable();
            $table->string('TURNO_ALUNO')->nullable();
            $table->string('RESPACAD')->nullable();
            $table->string('RESPACADEMAIL')->nullable();
            $table->string('RESPACADTEL1')->nullable();
            $table->string('RESPACADTEL2')->nullable();
            $table->string('RESPFIN')->nullable();
            $table->string('RESPFINEMAIL')->nullable();
            $table->string('RESPFINTEL1')->nullable();
            $table->string('RESPFINCEL')->nullable();
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
        Schema::dropIfExists('totvs');
    }
}
