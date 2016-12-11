<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Trabalho
 * 
 * @property int $id
 * @property string $nome
 * @property string $extensao
 * @property string $tipo
 * @property string $url_cloud
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $entregas
 *
 * @package App\Models
 */
class Trabalho extends Eloquent
{
	protected $fillable = [
		'nome',
		'extensao',
		'tipo',
		'url_cloud'
	];

	public function entregas()
	{
		return $this->belongsToMany(\App\Models\Entrega::class, 'entrega_trabalho', 'trabalhos_id', 'entregas_id')
					->withTimestamps();
	}
}
