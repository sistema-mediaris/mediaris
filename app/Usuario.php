<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'avatar', 'super', 'provider', 'social_id'];

    public function docente()
    {
        return $this->hasOne('App\Docente');
    }

    public function aluno()
    {
        return $this->hasOne('App\Aluno');
    }
    
}
