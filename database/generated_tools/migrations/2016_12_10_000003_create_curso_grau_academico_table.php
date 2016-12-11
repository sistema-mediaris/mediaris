<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoGrauAcademicoTable extends Migration
{
    /**
     * Run the migrations.
     * @table curso_grau_academico
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_grau_academico', function (Blueprint $table) {
            $table->engine = '';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('curso_grau_academico');
     }
}
