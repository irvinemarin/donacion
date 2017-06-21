<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CEProyectoController extends Controller
{
    public function index()
    {
        $listProyectos = \App\CE_Proyecto::orderBy('id', 'ASC')->paginate();
        $Estados = \App\CEEstados::all();

        return view('proyectos.index', compact('listProyectos', 'Estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Estados = \App\CEEstados::all()->where('tipoParent', '=', 'Campo Misionero');
        return view('proyectos.create', compact('Estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = new \App\CE_Proyecto;

        $año = date("Y-m-d", strtotime($request->fechaReg));

        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;

        $proyecto->idEstado = $request->idEstado;


        $proyecto->save();


        return redirect()->route('proyectos.index');
    }

    public function edit($id)
    {
        $proyecto = \App\CE_Proyecto::find($id);
        $Estados = \App\CEEstados::all()->where('tipoParent', '=', 'Campo Misionero');
        return view('proyectos.edit', compact('proyecto', 'Estados'));
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
        $proyecto = \App\CE_Proyecto::find($id);


        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->idEstado = $request->idEstado;
        $proyecto->save();


        return redirect()->route('proyectos.index');
    }

    public function show($id)
    {
        $proyecto = \App\CE_Proyecto::find($id);


        return view('donantes.show', compact('proyecto', 'listaDonaciones'));
    }
}
