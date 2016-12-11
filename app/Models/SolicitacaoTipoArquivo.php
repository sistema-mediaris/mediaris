<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SolicitacaoTipoArquivo
 * 
 * @property int $solicitacoes_id
 * @property int $tipos_arquivos_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TiposArquivo $tipos_arquivo
 * @property \App\Models\Solicitaco $solicitaco
 *
 * @package App\Models
 */
class SolicitacaoTipoArquivo extends Eloquent
{
	protected $table = 'solicitacao_tipo_arquivo';
	public $incrementing = false;

	protected $casts = [
		'solicitacoes_id' => 'int',
		'tipos_arquivos_id' => 'int'
	];

	public function tipos_arquivo()
	{
		return $this->belongsTo(\App\Models\TiposArquivo::class, 'tipos_arquivos_id');
	}

	public function solicitaco()
	{
		return $this->belongsTo(\App\Models\Solicitaco::class, 'solicitacoes_id');
	}
}
