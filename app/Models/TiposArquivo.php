<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TiposArquivo
 * 
 * @property int $id
 * @property string $extensao
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $solicitacao_tipo_arquivos
 *
 * @package App\Models
 */
class TiposArquivo extends Eloquent
{
	protected $fillable = [
		'extensao'
	];

	public function solicitacao_tipo_arquivos()
	{
		return $this->hasMany(\App\Models\SolicitacaoTipoArquivo::class, 'tipos_arquivos_id');
	}
}
