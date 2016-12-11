<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CidadeInstituicao
 * 
 * @property int $instituicoes_id
 * @property int $cidades_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Cidade $cidade
 * @property \App\Models\Instituico $instituico
 *
 * @package App\Models
 */
class CidadeInstituicao extends Eloquent
{
	protected $table = 'cidade_instituicao';
	public $incrementing = false;

	protected $casts = [
		'instituicoes_id' => 'int',
		'cidades_id' => 'int'
	];

	public function cidade()
	{
		return $this->belongsTo(\App\Models\Cidade::class, 'cidades_id');
	}

	public function instituico()
	{
		return $this->belongsTo(\App\Models\Instituico::class, 'instituicoes_id');
	}
}
