<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Curso
 * 
 * @property int $id
 * @property string $nome
 * @property int $duracao_sem
 * @property int $duracao_ano
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $disciplinas
 * @property \Illuminate\Database\Eloquent\Collection $curso_grau_academicos
 * @property \Illuminate\Database\Eloquent\Collection $curso_instituicaos
 * @property \Illuminate\Database\Eloquent\Collection $turnos
 *
 * @package App\Models
 */
class Curso extends Eloquent
{
	protected $casts = [
		'duracao_sem' => 'int',
		'duracao_ano' => 'int'
	];

	protected $fillable = [
		'nome',
		'duracao_sem',
		'duracao_ano'
	];

	public function disciplinas()
	{
		return $this->belongsToMany(\App\Models\Disciplina::class, 'curso_disciplina', 'cursos_id', 'disciplinas_id')
					->withTimestamps();
	}

	public function curso_grau_academicos()
	{
		return $this->hasMany(\App\Models\CursoGrauAcademico::class, 'cursos_id');
	}

	public function instituicaos()
	{
		return $this->belongsToMany(\App\Models\Instituicao::class, 'curso_instituicao');
	}

	public function turnos()
	{
		return $this->belongsToMany(\App\Models\Turno::class, 'curso_turno', 'cursos_id', 'turnos_id')
					->withTimestamps();
	}

	public function turmas()
	{
		return $this->hasMany(\App\Models\Turma::class, 'cursos_id');
	}
}
