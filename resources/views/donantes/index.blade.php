@extends('layout2')
@section('content')


    <div class="fixed-action-btn vertical ">

        <a class="btn-floating btn-large mdl-color--primary">
            <i class="large material-icons">menu</i>
        </a>
        <ul>
            <li>
                <a class="btn btn-floating blue tooltipped" data-position="left" data-delay="50"
                   data-tooltip="Nuevo Donante" href="{{route('donantes.create')}}">
                    <i class="material-icons">add</i>
                </a>
            </li>
            <li>
                <a class="btn-floating green darken-1 tooltipped" data-position="left" data-delay="50"
                   data-tooltip="Exportar Base de datos a Excel" href="{{route('excel.donantes')}}">
                    <i class="material-icons">library_books</i>
                </a>
            </li>
        </ul>

    </div>


    <div class="row">
        <div class="card-content col s12 m12 l3 ">
            <ul class=" collection with-header">
                <li class="collection-item ">
                    <div class=" nav-wrapper ">
                        {!! Form::open(['route' => 'donantes.index', 'method' => 'GET']) !!}
                        <div class="input-field">
                            {!!Form::search('nombres',null,['class'=>'validate','placeholder'=>'Buscar Donante']) !!}
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </li>

                <li class="collection-item active">
                    <div>Activos<a href="{{route('donantes.index')}}" class=" secondary-content"><i
                                    class="material-icons">send</i></a></div>
                </li>
                <li class="collection-item">
                    <div>Inactivos<a href="{{route('donantes.indexInactivo')}}" class="secondary-content"><i
                                    class="material-icons">send</i></a></div>
                </li>

            </ul>
            <div class="card ">
                <div class="card-content ">
                    <h6>Importar donantes desde un archivo Excel</h6>

                    {!! Form::open( ['route'=>'excel.import.donante','method'=>'POST']) !!}
                    <div class="row" style="    margin-bottom: 0px;     margin-left: 0px;     margin-right: 0px; ">
                        <div class="col s12 m12">
                            <div class="file-field input-field" style="    margin-top: 0px;">
                                <div class="row"
                                     style="    margin-left: 0px;     margin-right: 0px;     margin-bottom: 0px;">
                                    <div class="col s12">
                                        <span
                                                style="width: 100%;
                                                background: #00b8d4;
                                                padding: 5px;
                                                color: #ffffff;
                                                border-radius: 3px;">
                                            Seleccionar archivo
                                        </span>
                                        <input
                                                id="fileinput"
                                                type="file"
                                                name="excel"
                                                class=""
                                                accept=".xls,.xlsx">
                                    </div>
                                    <div class="col s6 m12">
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" style="width: 100%; "/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col s12 m12">
                            {!! Form::submit('Importar Donantes',['class'=>'btn blue waves-effect waves-light']) !!}
                        </div>
                    </div>
                    @if($mensaje!="")
                        <h6 class="red-text">{{$mensaje}} </h6>
                    @endif

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="card ">
                <div class="card-content ">
                    <h6>Importar donaciones para este donante</h6>

                    {!! Form::open( ['route'=>['excel.import.donacion', 0],'method'=>'POST']) !!}
                    <div class="row" style="    margin-bottom: 0px;     margin-left: 0px;     margin-right: 0px; ">
                        <div class="col s12 m12">
                            <div class="file-field input-field" style="    margin-top: 0px;">
                                <div class="row"
                                     style="    margin-left: 0px;     margin-right: 0px;     margin-bottom: 0px;">
                                    <div class="col s12">
                                        <span
                                                style="width: 100%;
                                                background: #00b8d4;
                                                padding: 5px;
                                                color: #ffffff;
                                                border-radius: 3px;">
                                            Seleccionar archivo
                                        </span>
                                        <input
                                                id="fileinput"
                                                type="file"
                                                name="excel"
                                                class=""
                                                accept=".xls,.xlsx">

                                        {!!Form::hidden('idDonanteExcel',0,['class'=>'validate','placeholder'=>'IdDonante']) !!}
                                    </div>
                                    <div class="col s6 m12">
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" style="width: 100%; "/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col s12 m12">
                            {!! Form::submit('Importar Promesas',['class'=>'btn blue waves-effect waves-light']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="card ">
                <div class="card-content ">
                    <h6>Importar Cuotas para esta promesa</h6>
                    {!! Form::open( ['route'=>['excel.import.detalle', 0],'method'=>'POST']) !!}
                    <div class="row" style="    margin-bottom: 0px;     margin-left: 0px;     margin-right: 0px; ">
                        <div class="col s12 m12">
                            <div class="file-field input-field" style="    margin-top: 0px;">
                                <div class="row"
                                     style="    margin-left: 0px;     margin-right: 0px;     margin-bottom: 0px;">
                                    <div class="col s12">
                                        <span
                                                style="width: 100%;
                                                background: #00b8d4;
                                                padding: 5px;
                                                color: #ffffff;
                                                border-radius: 3px;">
                                            Seleccionar archivo
                                        </span>
                                        <input
                                                id="fileinput"
                                                type="file"
                                                name="excel"
                                                class=""
                                                accept=".xls,.xlsx">

                                        {!!Form::hidden('idDonacionExcel',0,['class'=>'validate','placeholder'=>'IdDonante']) !!}
                                    </div>
                                    <div class="col s6 m12">
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" style="width: 100%; "/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m12">
                            {!! Form::submit('Importar Coutas',['class'=>'btn blue waves-effect waves-light']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>


        <div class="card col s12 m12 l9 ">
            <div class="card-content">
                <h4>Donantes Activos</h4>
                @include('donantes.partials.listaDonantes')


            </div>

        </div>
    </div>

@endsection