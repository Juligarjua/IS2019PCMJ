<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $fillable = ['name', 'paciente_id', 'especialidad_id'];

    public function pacientes()
    {
        return $this->belongsTo('App\Pacientes');
    }
    //PPONER EN APP-> PACIENTE:
    //public function enfermedades()
    //{
    //   return $this->hasMany('App\Enfermedad');
    //}

    public function especialidads()
    {
        return $this->belongsToMany('App\Especialidad');
    }

    //PONER EN APP->ESPECIALIDAD
    //public function enfermedads()
    //{
    //    return $this->belongsToMany('App\Enfermedad');
    //}
}
