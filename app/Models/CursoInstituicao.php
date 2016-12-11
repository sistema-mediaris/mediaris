<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CursoInstituicao
 * 
 * @property int $instituicoes_id
 * @property int $cursos_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Curso $curso
 * @property \App\Models\Instituico $instituico
 *
 * @package App\Models
 */
class CursoInstituicao extends Eloquent
{
	protected $table = 'curso_instituicao';
	public $incrementing = false;

	protected $casts = [
		'instituicoes_id' => 'int',
		'cursos_id' => 'int'
	];

	public function curso()
	{
		return $this->belongsTo(\App\Models\Curso::class, 'cursos_id');
	}

	public function instituico()
	{
		return $this->belongsTo(\App\Models\Instituico::class, 'instituicoes_id');
	}
}
