<?php

namespace App\Http\Controllers;

use App\CEEstados;
use App\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Estados = CEEstados::all()->where('tipoParent', '=', 'Usuario');
        return view('usuarios.create', compact('Estados'));

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
            'userPassword' => 'required|max:50',
            'estado' => 'required|max:50',
            'userName' => 'required|unique:usuarios|max:20|min:5',
        ]);

        $usuario = new Usuarios();
        $usuario->userName = $request->userName;
        $usuario->userPassword = $request->userPassword;
        $usuario->estado = $request->estado;//

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $Usuario = Usuarios::find($id);
        $Estados = CEEstados::all()->where('tipoParent', '=', 'Usuario');

        return view('usuarios.edit', compact('Usuario', 'Estados'));
    }

    public function login(Request $request)
    {
        $Usuario = null;

        $userName = $request->userName;
        $userPassword = $request->userPassword;
        $Usuario = Usuarios::where('userName ', '=', $userName)
            ->where('userPassword', '=', $userPassword);
//        dd($Usuario);
        if ($Usuario != null) {
            return redirect()->route('donantes.index');
        } else {
            return "error usuario o password";
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Usuarios $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'userPassword' => 'required|max:50',
            'estado' => 'required|max:50',
            'userName' => 'required|unique:usuarios|max:20|min:5',
        ]);
        $usuario = Usuarios::find($id);

        $usuario->userName = $request->userName;
        $usuario->userPassword = $request->userPassword;
        $usuario->estado = $request->estado;//
        $usuario->save();
        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
