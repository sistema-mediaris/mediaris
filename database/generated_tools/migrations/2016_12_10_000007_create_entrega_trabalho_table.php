<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaTrabalhoTable extends Migration
{
    /**
     * Run the migrations.
     * @table entrega_trabalho
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_trabalho', function (Blueprint $table) {
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
       Schema::dropIfExists('entrega_trabalho');
     }
}
