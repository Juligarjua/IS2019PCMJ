<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $fillable = ['name','especialidad_id'];

    public function paciente()
    {
        return $this->hasMany('App\Paciente');
    }
    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }


}
