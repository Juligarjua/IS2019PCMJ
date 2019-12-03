<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora','lugar', 'medico_id', 'paciente_id','tratamiento_id'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function tratamiento()
    {
        return $this->belongsToMany('App\Tratamiento')-> using('database\migrations');
    }


}
