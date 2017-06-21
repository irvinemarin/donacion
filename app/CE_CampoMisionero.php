<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CE_CampoMisionero extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'lugarSuperior', 'idEstado'
    ];

}
