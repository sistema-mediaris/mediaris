<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposArquivosTable extends Migration
{
    /**
     * Run the migrations.
     * @table tipos_arquivos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_arquivos', function (Blueprint $table) {
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
       Schema::dropIfExists('tipos_arquivos');
     }
}
