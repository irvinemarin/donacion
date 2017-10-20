<?php

namespace App\Http\Controllers;

use App\CE_CampoMisionero;
use App\CE_Donaciones;
use App\CE_Donantes;
use App\CE_Proyecto;
use App\CEEstados;
use Illuminate\Http\Request;
use App\Http\Requests\DonanteRequest;

class CEDonantesController extends Controller
{
    public function index(Request $request)

    {
        $mensaje = " ";
        $Donantes = CE_Donantes::orderBy('nombres', 'ASC')->paginate();
        $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
        $listDonantes = CE_Donantes::nombres($request->get('nombres'))->orderBy('apellidoPaterno', 'ASC')->where('idEstado', '=', 1)->paginate();
        return view('donantes.index', compact('listDonantes', 'camposMisioneros', 'Donantes', 'mensaje'));
    }


    public function indexInactivo(Request $request)
    {
        $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
        $listDonantes = CE_Donantes::nombres($request->get('nombres'))->orderBy('nombres', 'ASC')->where('idEstado', '=', 2)->paginate();
        return view('donantes.indexInactivo', compact('listDonantes', 'camposMisioneros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
        $Estados = CEEstados::all()->where('tipoParent', '=', 'Donante');

        return view('donantes.create', compact('camposMisioneros', 'Estados'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombres' => 'required|max:50',
            'apellidoPaterno' => 'required|max:50',
            'apellidoMaterno' => 'required|max:50',
            'dni' => 'required|unique:c_e__donantes|max:15|min:8',
            'idEstado' => 'required',
            'campoMisiId' => 'required',
        ]);


        $donante1 = new \App\CE_Donantes;

        $hoy = date("Y-m-d H:i:s");
//        dd("asd : " . $date);
        $año = date("Y", strtotime($request->fechaReg));
        $donante1->codDonante = $año . $request->dni;
        $donante1->nombres = $request->nombres;
        $donante1->apellidoPaterno = $request->apellidoPaterno;
        $donante1->apellidoMaterno = $request->apellidoMaterno;
        $donante1->dni = $request->dni;
        $donante1->celular = $request->celular;
        $donante1->email = $request->email;
        $donante1->direccion = $request->direccion;
        $donante1->fechaNac = $request->fechaNac;
        $donante1->fechaReg = $request->fechaReg;
        $donante1->idEstado = $request->idEstado;
        $donante1->cargo = $request->cargo;


        $donante1->campoMisiId = $request->campoMisiId;
        if ($request->fechaReg == "") {
            $donante1->fechaReg = $hoy;
        }
        if ($request->cargo == "") {
            $donante1->cargo = "-";
        }
        if ($request->celular == "") {
            $donante1->celular = "-";
        }
        if ($request->email == "") {
            $donante1->email = "-";
        }
        if ($request->direccion == "") {
            $donante1->direccion = "-";
        }
        if ($request->fechaNac == "") {
            $donante1->fechaNac = "-";
        }
//
        $donante1->save();
        return redirect()->route('donantes.index');
    }

    public function edit($id)
    {
        $listDonantes = CE_Donantes::find($id);
        $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
        $Estados = CEEstados::all()->where('tipoParent', '=', 'Donante');
        $EstadosFull = CEEstados::all();
        $Proyectos = CE_Proyecto::all();

//        return "Editar";

        return view('donantes.editdon', compact('listDonantes','Estados','EstadosFull','Proyectos','camposMisioneros'));
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
            'nombres' => 'required|max:50',
            'apellidoPaterno' => 'required|max:50',
            'apellidoMaterno' => 'required|max:50',
            'dni' => 'required|max:15|min:8',
            'idEstado' => 'required',
            'campoMisiId' => 'required',
        ]);

        $hoy = date("Y-m-d H:i:s");
        $donante1 = CE_Donantes::find($id);
        $donante1->codDonante = $request->codDonante;
        $donante1->nombres = $request->nombres;
        $donante1->apellidoPaterno = $request->apellidoPaterno;
        $donante1->apellidoMaterno = $request->apellidoMaterno;
        $donante1->dni = $request->dni;
        $donante1->celular = $request->celular;
        $donante1->email = $request->email;
        $donante1->direccion = $request->direccion;
        $donante1->fechaNac = $request->fechaNac;
        $donante1->fechaReg = $request->fechaReg;
        $donante1->idEstado = $request->idEstado;
        $donante1->cargo = $request->cargo;
        $donante1->campoMisiId = $request->campoMisiId;

        $donante1->campoMisiId = $request->campoMisiId;
        if ($request->fechaReg == "") {
            $donante1->fechaReg = $hoy;
        }
        if ($request->cargo == "") {
            $donante1->cargo = "-";
        }
        if ($request->celular == "") {
            $donante1->celular = "-";
        }
        if ($request->email == "") {
            $donante1->email = "-";
        }
        if ($request->direccion == "") {
            $donante1->direccion = "-";
        }
        if ($request->fechaNac == "") {
            $donante1->fechaNac = "-";
        }

        $donante1->save();

        return redirect()->route('donantes.show', $donante1->id);
    }

    public function show($id)
    {
        $donante1 = CE_Donantes::find($id);
        $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
        $Estados = CEEstados::all()->where('tipoParent', '=', 'Donante');
        $EstadosFull = CEEstados::all();
        $Proyectos = CE_Proyecto::all();
        $listaDonaciones = CE_Donaciones::where('idDonante', '=', $id)->orderBy('id', 'ASC')->paginate();
        return view('donantes.show', compact('donante1', 'listaDonaciones', 'camposMisioneros', 'Estados', 'EstadosFull', 'Proyectos'));
    }

    public function destroy($id)
    {
        $listDonantes = CE_Donantes::find($id);
        $listDonantes->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
    }


}
