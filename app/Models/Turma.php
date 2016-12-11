<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Turma
 * 
 * @property int $id
 * @property int $docentes_id
 * @property int $instituicoes_id
 * @property int $cursos_id
 * @property int $semestre
 * @property int $ano
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Turma $turma
 * @property \App\Models\Docente $docente
 * @property \App\Models\Instituico $instituico
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 * @property \Illuminate\Database\Eloquent\Collection $solicitacos
 * @property \Illuminate\Database\Eloquent\Collection $turmas
 *
 * @package App\Models
 */
class Turma extends Eloquent
{
	protected $casts = [
		'docentes_id' => 'int',
		'instituicoes_id' => 'int',
		'cursos_id' => 'int',
		'semestre' => 'int',
		'ano' => 'int'
	];

	protected $fillable = [
		'docentes_id',
		'instituicoes_id',
		'cursos_id',
		'semestre',
		'ano',
		'url'
	];

	public function turma()
	{
		return $this->belongsTo(\App\Models\Turma::class, 'cursos_id');
	}

	public function docente()
	{
		return $this->belongsTo(\App\Models\Docente::class, 'docentes_id');
	}

	public function instituico()
	{
		return $this->belongsTo(\App\Models\Instituico::class, 'instituicoes_id');
	}

	public function alunos()
	{
		return $this->belongsToMany(\App\Models\Aluno::class, 'aluno_turma', 'turmas_id', 'alunos_id')
					->withTimestamps();
	}

	public function solicitacos()
	{
		return $this->hasMany(\App\Models\Solicitaco::class, 'turmas_id');
	}

	public function turmas()
	{
		return $this->hasMany(\App\Models\Turma::class, 'cursos_id');
	}
}
