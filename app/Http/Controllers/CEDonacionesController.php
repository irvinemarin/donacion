<?php
namespace App\Http\Controllers;

use App\CE_CampoMisionero;
use App\CE_DetalleDonacion;
use App\CE_Donaciones;
use App\CE_Donantes;
use App\CEEstados;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class CEDonacionesController extends Controller
{
    public function index()
    {
        $listaDonaciones = \App\CE_Donaciones::orderBy('id', 'ASC')->paginate();
        return view('donaciones.index', compact('listaDonaciones'));
    }


    public function indexToFinalizadas()
    {
        $listaDonaciones = \App\CE_Donaciones::where('idEstado', '=', 3)->paginate();
        $listaProyectos = \App\CE_Proyecto::all();
        $donante = \App\CE_Donantes::all();


        return view('donaciones.finalizadas.index', compact('listaDonaciones', 'listaProyectos', 'donante'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'cantidad' => 'required',
            'nroCuota' => 'required',
            'abono' => 'required',
            'frecuencia' => 'required',
            'fechain' => 'required',
            'fechaFinal' => 'required',
            'modalidad' => 'required',
            'idDonante' => 'required',
            'idProyecto' => 'required',
            'idEstado' => 'required',

        ]);
        $donacion = new \App\CE_Donaciones;
        $año = date("Y");

        $donacionAntes = \App\CE_Donaciones::max('id');

        $idSig = $donacionAntes + 1;

        $donacion->codDonacion = $año . $request->nroCuota . $idSig;
        $donacion->cantidad = $request->cantidad;
        $donacion->nroCuota = $request->nroCuota;
        $donacion->abono = $request->abono;
        $donacion->frecuencia = $request->frecuencia;
        $donacion->fechain = $request->fechain;
        $donacion->fechaFinal = $request->fechaFinal;
        $donacion->modalidad = $request->modalidad;
        $donacion->idDonante = $request->idDonante;
        $donacion->idProyecto = $request->idProyecto;
        $donacion->idEstado = $request->idEstado;

        $donacion->save();

        return redirect()->route('donantes.show', $donacion->idDonante);
    }


    public function createToDonante($idDonante)
    {
        $donante = \App\CE_Donantes::find($idDonante);
        $Estados = CEEstados::where('tipoParent', '=', 'Donacion')->orderBy('nombre', 'ASC')->get();
        $Proyectos = \App\CE_Proyecto::all();
        return view('donaciones.create', compact('donante', 'Estados', 'Proyectos'));
    }


    public function edit($id)
    {

        $donacion = \App\CE_Donaciones::find($id);
        $donante = \App\CE_Donantes::find($donacion->idDonante);
        $Estados = CEEstados::all()->where('tipoParent', '=', 'Donacion');
        $Proyectos = \App\CE_Proyecto::orderBy('nombre', 'ASC')->get();
        return view('donaciones.edit', compact('donacion', 'Estados', 'Proyectos', 'donante'));


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'cantidad' => 'required',
            'nroCuota' => 'required',
            'abono' => 'required',
            'frecuencia' => 'required',
            'fechain' => 'required',
            'fechaFinal' => 'required',
            'modalidad' => 'required',
            'idDonante' => 'required',
            'idProyecto' => 'required',
            'idEstado' => 'required',
        ]);


        $donacion = \App\CE_Donaciones::find($id);

        $donacion->codDonacion = $request->codDonacion;
        $donacion->cantidad = $request->cantidad;
        $donacion->nroCuota = $request->nroCuota;
        $donacion->abono = $request->abono;
        $donacion->frecuencia = $request->frecuencia;
        $donacion->fechain = $request->fechain;
        $donacion->fechaFinal = $request->fechaFinal;
        $donacion->modalidad = $request->modalidad;
        $donacion->idDonante = $request->idDonante;
        $donacion->idProyecto = $request->idProyecto;
        $donacion->idEstado = $request->idEstado;

        $donacion->save();

        return redirect()->route('donantes.show', $donacion->idDonante);
    }

    public function show($idDonacion)
    {

        $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
        $Estados = CEEstados::all()->where('tipoParent', '=', 'Donante');
        $donacion = CE_Donaciones::find($idDonacion);
        $donante1 = CE_Donantes::find($donacion->idDonante);

        $ListaDetalleDonacion = CE_DetalleDonacion::where('idDonacion', '=', $idDonacion)->orderBy('id', 'ASC')->paginate();
//        dd("tamaño : " . count($ListaDetalleDonacion));
//        if (sizeof($ListaDetalleDonacion) > 0) {

        return view('donaciones.show', compact('donacion', 'ListaDetalleDonacion', 'donante1', 'camposMisioneros', 'Estados'));


//        } else {
//            return redirect()->route('donantes.show', $donacion->idDonante);
//        }} else {
//            return redirect()->route('donantes.show', $donacion->idDonante);
//        }
    }
}