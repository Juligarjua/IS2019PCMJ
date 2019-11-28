<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //
    protected $fillable = ['fecha_inicio','fecha_fin','descripcion','unidades','frecuencia','paciente_id'];

    public function pacientes()
    {
        return $this->hasMany('App\Paciente');

    }
    //public function tratamientos(){ return $this->belongsTo( 'App\Tratamientos');}

    public function medicamentos()
    {
        return $this->belongsToMany('App\Medicamento');
    }

}
