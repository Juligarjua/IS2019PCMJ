<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $fillable = ['lugar'];

    public function cita()
    {
        return $this->hasMany('App\Cita');
    }
    public function getFullNameAttribute()
    {
        return $this->lugar;
    }

}
