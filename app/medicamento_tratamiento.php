<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicamento_tratamiento extends Model
{
     protected $fillable = ['medicamento_id','tratamiento_id'];
        public function tratamientos()
        {
            return $this->belongsTo('App\Tratamiento');
        }
        public function medicamentos()
        {
            return $this->belongsTo('App\Medicamento');
        }
}
