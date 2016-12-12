<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Solicitacao
 * 
 * @property int $id
 * @property int $turmas_id
 * @property int $complementos_id
 * @property string $nome
 * @property \Carbon\Carbon $data_criacao
 * @property \Carbon\Carbon $data_entrega
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Complemento $complemento
 * @property \App\Models\Turma $turma
 * @property \Illuminate\Database\Eloquent\Collection $entregas
 * @property \Illuminate\Database\Eloquent\Collection $solicitacao_tipo_arquivos
 *
 * @package App\Models
 */
class Solicitacao extends Eloquent
{
	protected $table = 'solicitacoes';

	protected $casts = [
		'turmas_id' => 'int',
		'complementos_id' => 'int'
	];

	protected $dates = [
		'data_criacao',
		'data_entrega'
	];

	protected $fillable = [
		'turmas_id',
		'complementos_id',
		'nome',
		'data_criacao',
		'data_entrega'
	];

	public function complemento()
	{
		return $this->belongsTo(\App\Models\Complemento::class, 'complementos_id');
	}

	public function turma()
	{
		return $this->belongsTo(\App\Models\Turma::class, 'turmas_id');
	}

	public function entregas()
	{
		return $this->hasMany(\App\Models\Entrega::class, 'solicitacoes_id');
	}

	public function solicitacao_tipo_arquivos()
	{
		return $this->hasMany(\App\Models\SolicitacaoTipoArquivo::class, 'solicitacoes_id');
	}

	/**/
	public function tipos_arquivos()
	{
		return $this->belongsToMany(\App\Models\TiposArquivo::class, 'solicitacao_tipo_arquivo',  
      		'solicitacoes_id', 'tipos_arquivos_id')->withTimestamps();
	}
	
}
