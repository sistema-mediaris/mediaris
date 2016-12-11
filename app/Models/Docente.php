<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Docente
 * 
 * @property int $id
 * @property int $usuarios_id
 * @property int $titulacoes_id
 * @property string $nome_exibicao
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Titulaco $titulaco
 * @property \App\Models\Usuario $usuario
 * @property \Illuminate\Database\Eloquent\Collection $turmas
 *
 * @package App\Models
 */
class Docente extends Eloquent
{
	protected $casts = [
		'usuarios_id' => 'int',
		'titulacoes_id' => 'int'
	];

	protected $fillable = [
		'usuarios_id',
		'titulacoes_id',
		'nome_exibicao'
	];

	public function titulacao()
	{
		return $this->belongsTo(\App\Models\Titulacao::class, 'titulacoes_id');
	}

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'usuarios_id');
	}

	public function turmas()
	{
		return $this->hasMany(\App\Models\Turma::class, 'docentes_id');
	}
}
