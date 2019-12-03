<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //
    protected $fillable = ['fecha_inicio','fecha_fin','descripcion','unidades','frecuencia','medicamento_id','cita_id'];

    public function cita()
    {
        return $this->belongsToMany('App\Citas')-> using('database\cita_tratamiento');

    }

    public function medicamento()
    {
        return $this->belongsTo('App\Medicamento');
    }


}
