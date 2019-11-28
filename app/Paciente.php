<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $fillable = ['name', 'surname', 'nuhsa','enfermedad_id', 'tratamiento_id'];


    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
    public function tratamientos()
    {
        return $this->belongsTo('App\Tratamiento');
    }

    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->surname;
    }
    public function enfermedades()
    {
        return $this->belongsTo('App\Enfermedad');
    }

}
