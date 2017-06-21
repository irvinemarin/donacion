<?php

namespace App\Http\Controllers;

use App\CE_DetalleDonacion;
use App\CE_Donaciones;
use App\CE_Donantes;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function excelDonantes($idDonante)
    {
        $hoy = date("d-m-Y");
        Excel::create('Donantes_' . $hoy, function ($excel) {

            $excel->sheet('Donantes', function ($sheet) {

                $donates = CE_Donantes::all();

                $sheet->fromArray($donates);

            });
            $excel->sheet('Donaciones', function ($sheet) {

                $donaciones = CE_Donaciones::all();

                $sheet->fromArray($donaciones);


            });
            $excel->sheet('Promesas', function ($sheet) {
                $donaciones = CE_DetalleDonacion::all();

                $sheet->fromArray($donaciones);

            });
        })->export('xls');

    }

    public function excelDonaciones()
    {

        $hoy = date("d-m-Y");

        Excel::create('Donaciones_' . $hoy, function ($excel) {

            $excel->sheet('Donaciones', function ($sheet) {

                $donaciones = CE_Donaciones::all();

                $sheet->fromArray($donaciones);


            });


        })->export('xls');

    }

    public function excelPromesas()
    {

        $hoy = date("d-m-Y");

        Excel::create('Promesas_' . $hoy, function ($excel) {

            $excel->sheet('Promesas', function ($sheet) {
                $donaciones = CE_Donaciones::all();

                $sheet->fromArray($donaciones);

            });
        })->export('xls');

    }
}
