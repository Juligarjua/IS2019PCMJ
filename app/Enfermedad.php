<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $fillable = ['name','especialidad_id'];

    public function pacientes()
    {
        return $this->hasMany('App\Pacientes');
    }

    public function especialidads()
    {
        return $this->belongsTo('App\Especialidad');
    }

}