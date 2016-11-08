<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alunos';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->hasOne('App\Usuario');
    }

}
