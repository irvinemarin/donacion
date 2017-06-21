@extends('layout2')
@section('content')
    <div class="fixed-action-btn horizontal click-to-toggle">

        <a class="btn-floating btn-large mdl-color--primary tooltipped" data-position="top" data-delay="50"
           data-tooltip="Nuevo Donante" href="{{route('donantes.create')}}">
            <i class="material-icons">add</i>
        </a>

    </div>

    <div class="row">
        <div class="card-content col s12 m3">
            <ul class="collection with-header">
                <li class="collection-item ">
                    <div class=" nav-wrapper ">
                        {!! Form::open(['route' => 'donantes.indexInactivo', 'method' => 'GET']) !!}

                        <div class="input-field">
                            {!!Form::search('nombres',null,['class'=>'validate','placeholder'=>'Buscar Donante']) !!}
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </li>
                <li class="collection-item">
                    <div>Activos<a href="{{route('donantes.index')}}" class=" secondary-content"><i
                                    class="material-icons">send</i></a></div>
                </li>
                <li class="collection-item active">
                    <div>Inactivos<a href="{{route('donantes.indexInactivo')}}" class="secondary-content"><i
                                    class="material-icons">send</i></a></div>
                </li>

            </ul>

        </div>

        <div class="card col s12 m12 l9 ">
            <div class="card-content">
                <h4 class="mdl-cell mdl-cell--12-col">Donantes</h4>
                <table>
                    <thead>
                    <tr>
                        <th>Apellidos y Nombres</th>
                        <th>Campo Misionero</th>
                        <th>Código Donante</th>
                        <th class="right">Acción</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($listDonantes as $donantefila)
                        <tr>
                            <td>
                                {{strtoupper( $donantefila -> apellidoPaterno) }} {{strtoupper( $donantefila -> apellidoMaterno )}} {{ ucwords($donantefila -> nombres )}}
                            </td>

                            <td> @foreach($camposMisioneros as $campofila)
                                    @if ($campofila->id == $donantefila->campoMisiId)
                                        {{$campofila->nombre}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $donantefila -> codDonante }}</td>
                            <td>
                                <a style="margin-left: 15px;"
                                   class="btn-floating  waves-effect waves-light blue tooltipped secondary-content"
                                   href="{{ route('donantes.show', $donantefila->id) }}" data-position="top"
                                   data-delay="50" data-tooltip="ver">
                                    <i class="tiny material-icons center">visibility</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!!$listDonantes ->render()!!}

            </div>

        </div>
    </div>
    {!!$listDonantes ->render()!!}
@endsection