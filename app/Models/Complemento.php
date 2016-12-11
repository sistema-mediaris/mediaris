<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Complemento
 * 
 * @property int $id
 * @property string $descricao
 * @property string $assunto
 * @property string $objetivo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $solicitacos
 *
 * @package App\Models
 */
class Complemento extends Eloquent
{
	protected $fillable = [
		'descricao',
		'assunto',
		'objetivo'
	];

	public function solicitacos()
	{
		return $this->hasMany(\App\Models\Solicitaco::class, 'complementos_id');
	}
}
