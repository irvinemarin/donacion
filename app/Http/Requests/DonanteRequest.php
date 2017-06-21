	<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class DonanteRequest extends FormRequest
{
/**
* Determine if the user is authorized to make this request.
*
* @return bool
*/
public function authorize()
{
return true;
}
/**
* Get the validation rules that apply to the request.
*
* @return array
*/
public function rules()
{
return [
'codDonante' => 'required',
'nombres' => 'required',
'apellidoPaterno' => 'required',
'apellidoMaterno' => 'required',
'dni' => 'required',
'celular' => 'required',
'email' => 'required',
'direccion' => 'required',
'fechaNac' => 'required',
'fechaReg' => 'required',
'estado' => 'required',
'cargo' => 'required',
'campoMisiId' => 'required'
];
}
}