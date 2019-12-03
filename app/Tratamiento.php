<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //
    protected $fillable = ['fecha_inicio','fecha_fin','descripcion','unidades','frecuencia','medicamento_id'];

    public function paciente()
    {
        return $this->hasMany('App\Paciente');

    }

    public function medicamento()
    {
        return $this->belongsTo('App\Medicamento');
    }


}
