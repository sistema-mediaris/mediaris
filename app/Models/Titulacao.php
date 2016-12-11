<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Titulacao
 * 
 * @property int $id
 * @property string $nome
 * @property string $abreviacao
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $docentes
 *
 * @package App\Models
 */
class Titulacao extends Eloquent
{
	protected $table = 'titulacoes';

	protected $fillable = [
		'nome',
		'abreviacao'
	];

	public function docentes()
	{
		return $this->hasMany(\App\Models\Docente::class, 'titulacoes_id');
	}
}
