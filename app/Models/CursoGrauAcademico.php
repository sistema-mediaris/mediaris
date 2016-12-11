<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CursoGrauAcademico
 * 
 * @property int $cursos_id
 * @property int $graus_academicos_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Curso $curso
 * @property \App\Models\GrausAcademico $graus_academico
 *
 * @package App\Models
 */
class CursoGrauAcademico extends Eloquent
{
	protected $table = 'curso_grau_academico';
	public $incrementing = false;

	protected $casts = [
		'cursos_id' => 'int',
		'graus_academicos_id' => 'int'
	];

	public function curso()
	{
		return $this->belongsTo(\App\Models\Curso::class, 'cursos_id');
	}

	public function graus_academico()
	{
		return $this->belongsTo(\App\Models\GrausAcademico::class, 'graus_academicos_id');
	}
}
