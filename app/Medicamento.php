<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['nombreComercial', 'composicion', 'presentacion', 'enlaceOnline'];

    public function tratamientos()
    {

        return $this->hasMany('App\medicamento_tratamiento');
    }
}
