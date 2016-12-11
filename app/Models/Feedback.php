<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Feedback
 * 
 * @property int $id
 * @property string $comentario
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $entregas
 *
 * @package App\Models
 */
class Feedback extends Eloquent
{
	protected $fillable = [
		'comentario'
	];

	public function entregas()
	{
		return $this->hasMany(\App\Models\Entrega::class);
	}
}
