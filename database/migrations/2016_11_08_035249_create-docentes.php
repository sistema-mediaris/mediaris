<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuarios_id')->unsigned()->nullable()->default(null)->index();
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('titulacoes_id')->unsigned()->nullable()->default(null)->index();
            $table->foreign('titulacoes_id')->references('id')->on('titulacoes')->onDelete('no action');
            $table->string('nome_exibicao');
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
        Schema::dropIfExists('docentes');
    }
}
