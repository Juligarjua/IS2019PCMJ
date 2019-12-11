<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora','lugar', 'medico_id', 'paciente_id'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function medicamento()
    {
        return $this->belongsToMany('App\Medicamento')->withPivot('fecha_inicio','fecha_fin','descripcion','unidades','frecuencia');
    }


}
