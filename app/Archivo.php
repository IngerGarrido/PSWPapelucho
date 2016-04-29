<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = ['fileName','url','size'];

    public function galerias()
    {
        return $this->morphedByMany(Galeria::class, 'archivable');
    }

    public function jardines()
    {
        return $this->morphedByMany(Jardin::class, 'archivable');
    }

    public function niveles()
    {
        return $this->morphedByMany(Nivel::class, 'archivable');
    }

    public function parvulos()
    {
        return $this->morphedByMany(Parvulo::class, 'archivable');
    }

    public static function boot()
    {
        parent::boot();

        // al guardar un post
        \App\Archivo::saving(function($table){

        });
    }

    public function getFileUrlAttribute()
    {
        return url($this->url . $this->fileName);
    }

    public function scopeTypes($query, $types)
    {
        if( ! empty($types ))
        {
            $methodes = (array) explode('|',$types);
            return $query->where(function($q) use ($methodes)
            {
                foreach($methodes as $i => $method)
                {
                    $m = ($i == 0) ? 'has' : 'orHas';
                    $q->{$m}($method);
                }
            });
        }

        return $query;
    }

}