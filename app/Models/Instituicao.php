<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Instituicao
 * 
 * @property int $id
 * @property string $nome
 * @property string $sigla
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cidade_instituicaos
 * @property \Illuminate\Database\Eloquent\Collection $curso_instituicaos
 * @property \Illuminate\Database\Eloquent\Collection $turmas
 *
 * @package App\Models
 */
class Instituicao extends Eloquent
{
	protected $table = 'instituicoes';

	protected $fillable = [
		'nome',
		'sigla'
	];

	public function cidades()
	{
		return $this->belongsToMany(\App\Models\Cidade::class, 'cidade_instituicao',  
      		'instituicoes_id', 'cidades_id')->withTimestamps();
	}

	public function cursos()
	{
		return $this->belongsToMany(\App\Models\Curso::class, 'curso_instituicao',  
      		'instituicoes_id', 'cursos_id')->withTimestamps();
	}

	public function turmas()
	{
		return $this->hasMany(\App\Models\Turma::class, 'instituicoes_id');
	}
}
