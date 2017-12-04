<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sitio extends Model
{
    //

    protected $fillable = [
        'nombreSitio', 'descripcion', 'imgUrl', 'telefono',
    ];


    public function imagen()
    {
        return $this->hasMany('App\Imagen');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }


    public function resenia()
    {
        return $this->hasMany('App\Resenia');
    }

    public function tipoturismo()
    {
        return $this->hasOne('App\TipoTurismo');
    }
}
