<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['nombreComercial', 'composicion', 'presentacion', 'enlaceOnline','tratamiento_id'];

    public function tratamientos()
    {
        return $this->belongsToMany('App\Tratamiento');
    }
}
