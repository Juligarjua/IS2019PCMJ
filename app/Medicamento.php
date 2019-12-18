<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['nombreComercial', 'composicion', 'presentacion', 'enlaceOnline'];

    public function tratamiento()
    {
        return $this->hasMany('App\Tratamiento');
    }
}
