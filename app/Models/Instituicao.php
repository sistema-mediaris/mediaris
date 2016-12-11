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

	public function cidade_instituicaos()
	{
		return $this->hasMany(\App\Models\CidadeInstituicao::class, 'instituicoes_id');
	}

	public function curso_instituicaos()
	{
		return $this->hasMany(\App\Models\CursoInstituicao::class, 'instituicoes_id');
	}

	public function turmas()
	{
		return $this->hasMany(\App\Models\Turma::class, 'instituicoes_id');
	}
}
