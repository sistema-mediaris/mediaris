<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Aluno
 * 
 * @property int $id
 * @property int $usuarios_id
 * @property string $nome_exibicao
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Usuario $usuario
 * @property \Illuminate\Database\Eloquent\Collection $turmas
 * @property \Illuminate\Database\Eloquent\Collection $entregas
 *
 * @package App\Models
 */
class Aluno extends Eloquent
{
	protected $casts = [
		'usuarios_id' => 'int'
	];

	protected $fillable = [
		'usuarios_id',
		'nome_exibicao'
	];

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'usuarios_id');
	}

	public function turmas()
	{
		return $this->belongsToMany(\App\Models\Turma::class, 'aluno_turma', 'alunos_id', 'turmas_id')
					->withTimestamps();
	}

	public function entregas()
	{
		return $this->hasMany(\App\Models\Entrega::class, 'alunos_id');
	}
}
