<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CursoDisciplina
 * 
 * @property int $cursos_id
 * @property int $disciplinas_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Curso $curso
 * @property \App\Models\Disciplina $disciplina
 *
 * @package App\Models
 */
class CursoDisciplina extends Eloquent
{
	protected $table = 'curso_disciplina';
	public $incrementing = false;

	protected $casts = [
		'cursos_id' => 'int',
		'disciplinas_id' => 'int'
	];

	public function curso()
	{
		return $this->belongsTo(\App\Models\Curso::class, 'cursos_id');
	}

	public function disciplina()
	{
		return $this->belongsTo(\App\Models\Disciplina::class, 'disciplinas_id');
	}
}
