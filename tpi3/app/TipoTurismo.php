<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTurismo extends Model
{
    //

    protected $fillable = [
        'nombre', 'descripcion', 'clasificacion',
    ];

    public function sitio()
    {
        return $this->belongsTo('App\Sitio');
    }
}
