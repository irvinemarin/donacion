<?php

namespace App\Http\Controllers;

use App\CE_CampoMisionero;
use App\CE_DetalleDonacion;
use App\CE_Donaciones;
use App\CE_Donantes;
use Illuminate\Http\Request;

class CEDetalleDonacionController extends Controller
{
    public function index()
    {


        $ListaDetalleDonacion = CE_DetalleDonacion::orderBy('fecha', 'ASC')->Paginate(10);


        return view('detalleDonacion.index', compact('ListaDetalleDonacion'));
    }

    public function create()
    {
        $DetalleDonacion = CE_DetalleDonacion::all();
        $Estados = \App\CEEstados::all()->where('tipoParent', '=', 'Campo Misionero');

        return view('detalledonacion.create', compact('DetalleDonacion', 'Estados'));

    }

    public function createToDonacion($idDonacion)
    {
        $Donacion = CE_Donaciones::find($idDonacion);
        $donante = CE_Donantes::find($Donacion->idDonante);
        $DetalleDonacion = CE_DetalleDonacion::all();
        $Estados = \App\CEEstados::all()->where('tipoParent', '=', 'Campo Misionero');

        return view('detalledonacion.create', compact('DetalleDonacion', 'Estados', 'Donacion', 'donante'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'abono' => 'required',
            'fecha' => 'required',
            'campoMisioneroId' => 'required',

            'idDonacion' => 'required',
        ]);

        $DetalleDonacion = new CE_DetalleDonacion;

        $DetalleDonacion->abono = $request->abono;
        $DetalleDonacion->fecha = $request->fecha;
        $DetalleDonacion->campoMisioneroId = $request->campoMisioneroId;
        $DetalleDonacion->nroVaucher = $request->nroVaucher;
        if ($request->nroVaucher == "") {
            $DetalleDonacion->nroVaucher = "-";
        }
        $DetalleDonacion->idDonacion = $request->idDonacion;
        $DetalleDonacion->save();


        $nuevoAbono = 0;

        $AbonosPromesa = CE_DetalleDonacion::all()->where('idDonacion', '=', $DetalleDonacion->idDonacion);

        foreach ($AbonosPromesa as $abonoFila) {
            $nuevoAbono = $abonoFila->abono + $nuevoAbono;
        }

        $Donacion = CE_Donaciones::find($DetalleDonacion->idDonacion);
        $Donacion->abono = $nuevoAbono;
        $Donacion->restante =$Donacion->cantidad - $nuevoAbono;

        $Donacion->save();
        return redirect()->route('donaciones.show', $request->idDonacion);
    }

    public function edit($id)
    {
        $detalleDonacion = CE_DetalleDonacion::find($id);
        $donacion = CE_Donaciones::find($detalleDonacion->idDonacion);
        $donante = CE_Donantes::find($donacion->idDonante);

        $Estados = \App\CEEstados::all()->where('tipoParent', '=', 'Campo Misionero');
        return view('detalledonacion.edit', compact('detalleDonacion', 'Estados', 'donante', 'donacion'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'abono' => 'required',
            'fecha' => 'required',
            'campoMisioneroId' => 'required',
            'nroVaucher' => 'required',
            'idDonacion' => 'required',
        ]);

        $DetalleDonacion = CE_DetalleDonacion::find($id);

        $DetalleDonacion->abono = $request->abono;
        $DetalleDonacion->fecha = $request->fecha;
        $DetalleDonacion->campoMisioneroId = $request->campoMisioneroId;
        $DetalleDonacion->nroVaucher = $request->nroVaucher;
        $DetalleDonacion->idDonacion = $request->idDonacion;


        $DetalleDonacion->save();

        $nuevoAbono = 0;
        $AbonosPromesa = CE_DetalleDonacion::all()->where('idDonacion', '=', $DetalleDonacion->idDonacion);

        foreach ($AbonosPromesa as $abonoFila) {
            $nuevoAbono = $abonoFila->abono + $nuevoAbono;
        }

        $Donacion = CE_Donaciones::find($DetalleDonacion->idDonacion);
        $Donacion->abono = $nuevoAbono;
        $Donacion->restante =$Donacion->cantidad - $nuevoAbono;
        $Donacion->save();

        return redirect()->route('donaciones.show', $request->idDonacion);
    }

    public function show($idDonacion)
    {
        $donacion = CE_Donaciones::find($idDonacion);
        $donante = CE_Donaciones::find($donacion->idDonante);
        $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
        $ListaDetalleDonacion = CE_DetalleDonacion::find('idDonacion', '=', $idDonacion)->orderBy('id', 'ASC')->paginate(50);
        return view('detalledonacion.index', compact('donacion', 'ListaDetalleDonacion', 'camposMisioneros', 'Estados', 'donante'));
    }
}
