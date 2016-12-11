<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaoTipoArquivoTable extends Migration
{
    /**
     * Run the migrations.
     * @table solicitacao_tipo_arquivo
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacao_tipo_arquivo', function (Blueprint $table) {
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
       Schema::dropIfExists('solicitacao_tipo_arquivo');
     }
}
