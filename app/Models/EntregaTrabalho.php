<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EntregaTrabalho
 * 
 * @property int $entregas_id
 * @property int $trabalhos_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Entrega $entrega
 * @property \App\Models\Trabalho $trabalho
 *
 * @package App\Models
 */
class EntregaTrabalho extends Eloquent
{
	protected $table = 'entrega_trabalho';
	public $incrementing = false;

	protected $casts = [
		'entregas_id' => 'int',
		'trabalhos_id' => 'int'
	];

	public function entrega()
	{
		return $this->belongsTo(\App\Models\Entrega::class, 'entregas_id');
	}

	public function trabalho()
	{
		return $this->belongsTo(\App\Models\Trabalho::class, 'trabalhos_id');
	}
}
