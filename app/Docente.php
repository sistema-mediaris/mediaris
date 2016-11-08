<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'docentes';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuarios_id');
    }

    public function titulacao()
    {
        return $this->belongsTo('App\Titulacao', 'titulacoes_id');
    }

}
