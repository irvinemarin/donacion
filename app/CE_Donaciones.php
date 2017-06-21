<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class CE_Donaciones extends Model
{
protected $fillable = [
	'codDonacion','cantidad', 'nroCuota',  'abono','frecuencia','fechain', 'fechaFinal', 'modalidad', 'idDonante', 'idProyecto' ,'idEstado'
	];
	
}