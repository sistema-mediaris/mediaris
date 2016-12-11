<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Estado
 * 
 * @property int $id
 * @property string $nome
 * @property string $sigla
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cidades
 *
 * @package App\Models
 */
class Estado extends Eloquent
{
	protected $fillable = [
		'nome',
		'sigla'
	];

	public function cidades()
	{
		return $this->hasMany(\App\Models\Cidade::class, 'estados_id');
	}
}
