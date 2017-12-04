<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    protected $fillable = [
       'imgUrl', 
    ];

    public function sitio()
    {
        return $this->belongsTo('App\Sitio');
    }
}
