<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //
    protected $fillable = ['fecha_inicio','fecha_fin','descripcion','unidades','frecuencia'];

    public function paciente()
    {
        return $this->hasMany('App\Paciente');

    }
    //public function tratamientos(){ return $this->belongsTo( 'App\Tratamientos');}

    public function medicamento_tratamiento()
    {
        return $this->hasMany('App\medicamento_tratamiento');
    }


}
