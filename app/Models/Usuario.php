<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 11 Dec 2016 12:23:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $avatar
 * @property string $provider
 * @property string $social_id
 * @property bool $super
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 * @property \Illuminate\Database\Eloquent\Collection $docentes
 *
 * @package App\Models
 */
class Usuario extends Eloquent
{
	protected $casts = [
		'super' => 'bool'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'avatar',
		'provider',
		'social_id',
		'super',
		'remember_token'
	];

	public function aluno()
	{
		return $this->hasOne(\App\Models\Aluno::class, 'usuarios_id');
	}

	public function docente()
	{
		return $this->hasOne(\App\Models\Docente::class, 'usuarios_id');
	}
}
