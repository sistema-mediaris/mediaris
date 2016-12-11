<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AlunoTurma
 * 
 * @property int $alunos_id
 * @property int $turmas_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Aluno $aluno
 * @property \App\Models\Turma $turma
 *
 * @package App\Models
 */
class AlunoTurma extends Eloquent
{
	protected $table = 'aluno_turma';
	public $incrementing = false;

	protected $casts = [
		'alunos_id' => 'int',
		'turmas_id' => 'int'
	];

	public function aluno()
	{
		return $this->belongsTo(\App\Models\Aluno::class, 'alunos_id');
	}

	public function turma()
	{
		return $this->belongsTo(\App\Models\Turma::class, 'turmas_id');
	}
}
