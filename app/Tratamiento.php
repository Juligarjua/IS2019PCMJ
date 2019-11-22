<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //
    protected $fillable = ['fecha_inicio','fecha_fin','lugar'];

    public function pacientes()
    {
        return $this->belongsToMany('App\Paciente');
    }
    public function medicamentos()
    {
        return $this->belongsToMany('App\Medicamento');
    }

}
