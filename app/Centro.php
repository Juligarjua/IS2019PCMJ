<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $fillable = ['lugar'];

    public function citas()
    {
        return $this->hasMany('App\Citas');
    }
    public function getFullNameAttribute()
    {
        return $this->lugar;
    }

}
