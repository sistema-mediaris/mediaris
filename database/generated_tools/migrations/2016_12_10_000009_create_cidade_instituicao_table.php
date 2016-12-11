<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadeInstituicaoTable extends Migration
{
    /**
     * Run the migrations.
     * @table cidade_instituicao
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidade_instituicao', function (Blueprint $table) {
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
       Schema::dropIfExists('cidade_instituicao');
     }
}
