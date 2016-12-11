<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrausAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     * @table graus_academicos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graus_academicos', function (Blueprint $table) {
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
       Schema::dropIfExists('graus_academicos');
     }
}
