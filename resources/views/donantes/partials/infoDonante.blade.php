<div class="card">

    <div class="card-content">
        <div class="row">
            <div class="col s10 center">
                <img src="http://sbs101solutions.com/includes/img/profile_pic.png" class="circle responsive-img"
                     alt="" style="border-radius: 50%; height: 70px; margin: auto;"/>
            </div>
            <div class="col s1">
                <a class="waves-effect waves-light  tooltipped  activator right" href="#" data-position="top"
                   style="border-radius: 50%;" data-delay="50" data-tooltip="Modificar">
                    <i class="material-icons black-text">
                        mode_edit
                    </i>
                </a>
            </div>
        </div>
        <div class="row">

            <div class="col s12 center">
					<span class="card-title  grey-text text-darken-4" style="font-size: 14px; margin: auto;">
						{{strtoupper( $donante1 -> apellidoPaterno) }} {{strtoupper( $donante1 -> apellidoMaterno )}}
                        , {{ ucwords($donante1 -> nombres )}}
					</span>
            </div>


        </div>

        <div class="row">

            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; ">
                    Cod Donante :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    {{ $donante1 -> codDonante }}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; ">
                    Dni :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    {{ $donante1 -> dni }}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; "><i class="Tiny material-icons">person_pin</i>
                    direccion :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    {{ $donante1 -> direccion }}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; "><i
                            class="Tiny material-icons">event</i>
                    Nacimiento :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    {{ $donante1 -> fechaNac }}
                </label>
            </div>

        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; "><i
                            class="Tiny material-icons prefix">
                        phone
                    </i>
                    Celular :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    {{ $donante1 -> celular }}
                </label>
            </div>

        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; "><i
                            class="Tiny material-icons prefix">
                        email
                    </i>
                    E-mail :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    {{ $donante1 -> email }}
                </label>
            </div>

        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; "><i
                            class="Tiny material-icons prefix">
                        contact_phone
                    </i>
                    Estado :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    @foreach($Estados as $fila)
                        @if ($fila->id == $donante1->idEstado)
                            {{$fila->nombre}}
                        @endif
                    @endforeach
                </label>
            </div>

        </div>
        <div class="row">
            <div class="col s5 ">
                <label class="left" style="color:black; font-size: 12px; "><i
                            class="Tiny material-icons prefix">
                        event
                    </i>
                    Registro :
                </label>
            </div>
            <div class="col s7 ">
                <label class="right">
                    {{ $donante1 -> fechaReg }}
                </label>
            </div>

        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; "><i
                            class="Tiny material-icons prefix">
                        work
                    </i>
                    Cargo :
                </label>
            </div>
            <div class="col s6 ">
                <label class="right">
                    {{ $donante1 -> cargo }}
                </label>
            </div>

        </div>
        <div class="row">
            <div class="col s6 ">
                <label class="left" style="color:black; font-size: 12px; "><i
                            class="Tiny material-icons prefix">
                        contact_phone
                    </i>
                    Campo Misionero :
                </label>
            </div>

            <div class="col s6 ">
                <label class="right">
                    @foreach($camposMisioneros as $campofila)
                        @if ($campofila->id == $donante1->campoMisiId)
                            {{$campofila->nombre}}
                        @endif
                    @endforeach
                </label>
            </div>

        </div>

    </div>
    <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Editando Donante<i
                            class="material-icons right">close</i></span>
        {!! Form::model($donante1, ['route' => ['donantes.update', $donante1->id], 'method' => 'PUT']) !!}

        @include('donantes.partials.form')

        {!! Form::close() !!}
    </div>
</div>