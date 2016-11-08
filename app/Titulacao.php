<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulacao extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'titulacoes';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function docentes()
    {
        return $this->hasMany('App\Docente');
    }

}
