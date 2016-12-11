<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Disciplina
 * 
 * @property int $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cursos
 *
 * @package App\Models
 */
class Disciplina extends Eloquent
{
	protected $fillable = [
		'nome'
	];

	public function cursos()
	{
		return $this->belongsToMany(\App\Models\Curso::class, 'curso_disciplina', 'disciplinas_id', 'cursos_id')
					->withTimestamps();
	}
}
