<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';

    public function jornada()
    {
        return $this->belongsToMany('App\Jornada','jornadas');
    }

    public function jardin()
    {
        return $this->belongsToMany('App\Jardin','jardines');
    }

    protected $fillable = ['name'];

}