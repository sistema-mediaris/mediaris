<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CursoTurno
 * 
 * @property int $cursos_id
 * @property int $turnos_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Curso $curso
 * @property \App\Models\Turno $turno
 *
 * @package App\Models
 */
class CursoTurno extends Eloquent
{
	protected $table = 'curso_turno';
	public $incrementing = false;

	protected $casts = [
		'cursos_id' => 'int',
		'turnos_id' => 'int'
	];

	public function curso()
	{
		return $this->belongsTo(\App\Models\Curso::class, 'cursos_id');
	}

	public function turno()
	{
		return $this->belongsTo(\App\Models\Turno::class, 'turnos_id');
	}
}
