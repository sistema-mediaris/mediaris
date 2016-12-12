<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Turno
 * 
 * @property int $id
 * @property string $periodo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cursos
 *
 * @package App\Models
 */
class Turno extends Eloquent
{
	protected $fillable = [
		'periodo'
	];

	public function cursos()
	{
		return $this->belongsToMany(\App\Models\Curso::class, 'curso_turno', 'turnos_id', 'cursos_id')
					->withTimestamps();
	}

	public function turmas()
	{
		return $this->hasMany(\App\Models\Turma::class, 'turnos_id');
	}
}
