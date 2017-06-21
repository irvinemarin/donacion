<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_Proyecto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'idEstado'
    ];


}
