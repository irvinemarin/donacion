<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CE_Donantes extends Model
{
    protected $fillable = [
        'codDonante', 'nombres', 'apellidoPaterno', 'apellidoMaterno', 'dni', 'celular', 'email', 'direccion', 'fechaNac', 'fechaReg', 'idEstado', 'cargo', 'campoMisiId'
    ];

    public function scopeNombres($query, $nombres)
    {
        if ($nombres != "") {

            $query->where(DB::raw("CONCAT(nombres,' ',apellidoPaterno,' ',apellidoMaterno,' ',codDonante)"), "LIKE", "%$nombres%");
        }
    }
}