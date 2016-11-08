<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function docente()
    {
        return $this->belongsTo('App\Docente');
    }

    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }
    
}
