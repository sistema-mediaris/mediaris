<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoInstituicaoTable extends Migration
{
    /**
     * Run the migrations.
     * @table curso_instituicao
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_instituicao', function (Blueprint $table) {
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
       Schema::dropIfExists('curso_instituicao');
     }
}
