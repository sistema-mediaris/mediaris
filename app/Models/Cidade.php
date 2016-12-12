<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cidade
 * 
 * @property int $id
 * @property string $nome
 * @property int $estados_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Estado $estado
 * @property \Illuminate\Database\Eloquent\Collection $cidade_instituicaos
 *
 * @package App\Models
 */
class Cidade extends Eloquent
{
	protected $casts = [
		'estados_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'estados_id'
	];

	public function estado()
	{
		return $this->belongsTo(\App\Models\Estado::class, 'estados_id');
	}

	public function instituicoes()
	{
		return $this->belongsToMany(\App\Models\Instituicao::class);
	}
}
