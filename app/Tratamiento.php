<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['id','cita_id','medicamento_id','fecha_inicio','fecha_fin','descripcion','unidades','frecuencia'];


    public function medicamento()
    {
        return $this->belongsTo('App\Medicamento');
    }

    public function citas()
    {
        return $this->belongsTo('App\Cita');
    }

}
