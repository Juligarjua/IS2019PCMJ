<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    //
    protected $fillable = ['name'];

    public function medico()
    {
        return $this->hasMany('App\Medico');
    }

    public function enfermedad()
    {
        return $this->hasMany('App\Enfermedad');
    }


}
