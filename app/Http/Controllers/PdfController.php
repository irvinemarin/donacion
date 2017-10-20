<?php

namespace App\Http\Controllers;

use App\CE_CampoMisionero;
use App\CE_DetalleDonacion;
use App\CE_Donaciones;
use App\CE_Donantes;
use App\CE_Proyecto;
use App\CEEstados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class PdfController extends Controller
{


    public function show($idDonante)
    {
        $total = 0.00;
        $donante1 = \App\CE_Donantes::find($idDonante);
        $listaDonaciones = \App\CE_Donaciones::where('idDonante', '=', $idDonante)->orderBy('id', 'ASC')->paginate();
        $CampoMisionero = CE_CampoMisionero::find($donante1->campoMisiId);
        $Estado = CEEstados::find($donante1->idEstado);
        $EstadoList = CEEstados::all();
        $ListaProyectos = CE_Proyecto::all();


        foreach ($listaDonaciones as $donacion) {
            $total = $donacion->abono + $total;
        }

        return view('pdf.show', compact('EstadoList', 'ListaProyectos', 'donante1', 'listaDonaciones', 'total', 'CampoMisionero', 'Estado'));
    }

    public function showFinalizadas()
    {

        $listaDonaciones = \App\CE_Donaciones::where('idEstado', '=', 3)->paginate();
        $listaProyectos = \App\CE_Proyecto::all();
        $donante = \App\CE_Donantes::all();


        return view('pdf.showfinalizadas', compact('listaDonaciones', 'listaProyectos', 'donante'));
    }

    public function showPromesa($idDonante, $idDonacion)
    {

        $total = 0.00;
        $donante1 = CE_Donantes::find($idDonante);
        $donacion = CE_Donaciones::find($idDonacion);
        $ListaAbonos = CE_DetalleDonacion::where('idDonacion', '=', $idDonacion)->orderBy('id', 'ASC')->paginate(50);
        $Proyecto = CE_Proyecto::find($donacion->idProyecto);
        $CampoMisionero = CE_CampoMisionero::find($donante1->campoMisiId);
        $ListaCamposMisioneros = CE_CampoMisionero::all();


        foreach ($ListaAbonos as $abono) {
            $total = $abono->abono + $total;
        }

        return view('pdf.showpromesa', compact('donante1', 'donacion', 'ListaAbonos', 'Proyecto', 'CampoMisionero', 'total', 'ListaCamposMisioneros'));
    }


}
