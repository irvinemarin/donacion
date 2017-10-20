@extends('layout2')
@section('content')
    <div class="col s8 offset-s2">
        <div class="card">
            <div id="" class="card-content">

                <div class="row center">

                    <a class="btn-floating btn-small waves-effect waves-light blue tooltipped right"
                       href="{{ route('donantes.show',$donante->id)}}" data-position="top" data-delay="50"
                       data-tooltip="Cancelar">
                        <i class="material-icons">
                            replay
                        </i>
                    </a>
                    <H4>Editando Donacion</H4>
                </div>

                <div class="row center">


                    <div id="tabDatosPersonales" class="col s12 center">


                        {!! Form::model($donacion, ['route' => ['donaciones.update', $donacion->id], 'method' => 'PUT']) !!}

                        @include('donaciones.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section("script")
    <script>


        $("#nroCuota").on('keyup', function () {
            var frecuencia = $("#frecuencia").val()
            var nroCuota = $("#nroCuota").val()
            var fecha = $('[name="fechain"]').val()
            var mobjdate = moment(fecha, 'DD-MM-YYYY');

            mobjdate.add(nroCuota, 'months');

            $('[name="fechaFinal"]').val(mobjdate.format('DD-MM-YYYY'))
            $('[for="fechaFinal"]').addClass('active');

        });
        $("#fechain").on('change', function () {
            var frecuencia = $("#frecuencia").val()
            var nroCuota = $("#nroCuota").val()
            var fecha = $('[name="fechain"]').val()
            var mobjdate = moment(fecha, 'DD-MM-YYYY');

            mobjdate.add(nroCuota, 'months');

            $('[name="fechaFinal"]').val(mobjdate.format('DD-MM-YYYY'))
            $('[for="fechaFinal"]').addClass('active');

        });



    </script>
@endsection