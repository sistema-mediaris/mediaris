<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GrausAcademico
 * 
 * @property int $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $curso_grau_academicos
 *
 * @package App\Models
 */
class GrausAcademico extends Eloquent
{
	protected $fillable = [
		'nome'
	];

	public function curso_grau_academicos()
	{
		return $this->hasMany(\App\Models\CursoGrauAcademico::class, 'graus_academicos_id');
	}
}
