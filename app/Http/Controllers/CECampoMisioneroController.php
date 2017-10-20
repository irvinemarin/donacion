<?php

namespace App\Http\Controllers;

use App\CE_CampoMisionero;
use Illuminate\Http\Request;

class CECampoMisioneroController extends Controller
{
    public function index()
    {
        $ListaCamposMis = \App\CE_CampoMisionero::orderBy('nombre', 'ASC')->paginate(20);


        return view('campos.index', compact('ListaCamposMis'));
    }

    public function create()
    {
        $CampoMisionero = \App\CE_CampoMisionero::all();
        $Estados = \App\CEEstados::all()->where('tipoParent', '=', 'Campo Misionero');

        return view('campos.create', compact('CampoMisionero', 'Estados'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $CampoMisionero = new \App\CE_CampoMisionero;
        $CampoMisionero->nombre = $request->nombre;
        $CampoMisionero->descripcion = $request->descripcion;
        $CampoMisionero->lugarSuperior = $request->lugarSuperior;
        $CampoMisionero->idEstado = $request->idEstado;

        $CampoMisionero->save();


        return redirect()->route('camposMisioneros.index');
    }

    public function edit($id)
    {
        $CampoMisionero = \App\CE_CampoMisionero::find($id);
        $Estados = \App\CEEstados::all()->where('tipoParent', '=', 'Campo Misionero');
        return view('campos.edit', compact('CampoMisionero', 'Estados'));
    }

    public function update(Request $request, $id)
    {
        $campoMisionero = CE_CampoMisionero::find($id);

        $campoMisionero->nombre = $request->nombre;
        $campoMisionero->descripcion = $request->descripcion;
        $campoMisionero->lugarSuperior = $request->lugarSuperior;
        $campoMisionero->idEstado = $request->idEstado;


        $campoMisionero->save();

        return redirect()->route('camposMisioneros.index');
    }

}
