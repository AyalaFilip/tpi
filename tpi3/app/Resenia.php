<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resenia extends Model
{
    //

     protected $fillable = [
        'contenido', 'valoracion', 'sitio_id',
    ];


    public function sitio()
    {
        return $this->belongsTo('App\Sitio');
    }
}
