<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulacoesTable extends Migration
{
    /**
     * Run the migrations.
     * @table titulacoes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulacoes', function (Blueprint $table) {
            $table->engine = '';
            $table->integer('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('titulacoes');
     }
}
