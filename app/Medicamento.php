<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['nombreComercial', 'composicion', 'presentacion', 'enlaceOnline'];

    public function cita()
    {

        return $this->belongsToMany('App\Cita')->withPivot('fecha_inicio','fecha_fin','descripcion','unidades','frecuencia');
    }

}
