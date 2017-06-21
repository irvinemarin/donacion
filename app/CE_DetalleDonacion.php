<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class CE_DetalleDonacion extends Model
{
    protected $fillable = [
        'abono', 'fecha', 'nroVaucher', 'idDonacion', 'campoMisioneroId'
    ];


    public function getFechaAttribute($fecha)
    {
        return new Date($fecha);
    }

}
