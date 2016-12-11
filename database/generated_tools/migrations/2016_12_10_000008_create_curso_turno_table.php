<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTurnoTable extends Migration
{
    /**
     * Run the migrations.
     * @table curso_turno
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_turno', function (Blueprint $table) {
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
       Schema::dropIfExists('curso_turno');
     }
}
