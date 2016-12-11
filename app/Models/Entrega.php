<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Entrega
 * 
 * @property int $id
 * @property int $alunos_id
 * @property int $solicitacoes_id
 * @property int $feedback_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Aluno $aluno
 * @property \App\Models\Feedback $feedback
 * @property \App\Models\Solicitaco $solicitaco
 * @property \Illuminate\Database\Eloquent\Collection $trabalhos
 *
 * @package App\Models
 */
class Entrega extends Eloquent
{
	protected $casts = [
		'alunos_id' => 'int',
		'solicitacoes_id' => 'int',
		'feedback_id' => 'int'
	];

	protected $fillable = [
		'alunos_id',
		'solicitacoes_id',
		'feedback_id'
	];

	public function aluno()
	{
		return $this->belongsTo(\App\Models\Aluno::class, 'alunos_id');
	}

	public function feedback()
	{
		return $this->belongsTo(\App\Models\Feedback::class);
	}

	public function solicitaco()
	{
		return $this->belongsTo(\App\Models\Solicitaco::class, 'solicitacoes_id');
	}

	public function trabalhos()
	{
		return $this->belongsToMany(\App\Models\Trabalho::class, 'entrega_trabalho', 'entregas_id', 'trabalhos_id')
					->withTimestamps();
	}
}
