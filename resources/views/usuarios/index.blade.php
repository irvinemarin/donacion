@extends('layout-users')
@section('content')
    <div class="fixed-action-btn horizontal click-to-toggle">

        <a class="btn-floating btn-large mdl-color--primary tooltipped" href="{{ route('usuarios.create') }}"
           data-position="top" data-delay="50" data-tooltip="Nuevo Usuario">
            <i class="material-icons">add</i>
        </a>

    </div>
    <div class="card col s12 m12 l8 offset-l2">
        <div class="row">
            <h4 class="col s12 center">
                Lista de Usuarios
            </h4>

        </div>
        <div class="row">
            <div class="col s12">
                <table class="striped responsive-table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>password</th>
                        <th>estado</th>
                        <th class="right">Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $userFila)
                        <tr>
                            <td>{{$userFila->id}}</td>
                            <td>{{$userFila->userName}}</td>
                            <td>{{$userFila->userPassword}}</td>
                            <td>{{$userFila->estado}}</td>
                            <td>
                                <a class="waves-effect waves-light tooltipped right"
                                   data-position="right" data-delay="50" data-tooltip="Editar"
                                   href="{{route('usuarios.edit',$userFila->id)}}">
                                    <i class="material-icons right">
                                        mode_edit
                                    </i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


        </div>

    </div>
@endsection