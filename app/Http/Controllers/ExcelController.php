<?php

namespace App\Http\Controllers;

use App\CE_CampoMisionero;
use App\CE_DetalleDonacion;
use App\CE_Donaciones;
use App\CE_Donantes;
use App\CE_Proyecto;
use App\CEEstados;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{


    public function excelDonantes()
    {
        $hoy = date("d-m-Y");


        Excel::create('Donantes_' . $hoy, function ($excel) {


            $excel->sheet('Donantes', function ($sheet) {
                $ListCampoMisionero = CE_CampoMisionero::all();
                $ListEstados = CEEstados::all();


                $ListDonates = CE_Donantes::select(
                    'id as id_Donante',
                    'nombres as Nombres',
                    'apellidoPaterno as Apellido_Paterno',
                    'apellidoMaterno as Apellido Materno',
                    'dni as DNI',
                    'celular as Celular',
                    'email as E-mail',
                    'direccion as Direccion',
                    'fechaNac as Fecha_Nacimiento',
                    'fechaReg as Fecha_Registro',
                    'idEstado as Estado',
                    'campoMisiId as Campo_Misionero'
                )->get();


                foreach ($ListDonates as $filaDonante) {
                    foreach ($ListEstados as $filaEstado) {
                        if ($filaDonante->Estado == $filaEstado->id) {
                            $filaDonante->Estado = $filaEstado->nombre;
                        }
                    }
                    foreach ($ListCampoMisionero as $filaCampo) {

                        if ($filaDonante->Campo_Misionero == $filaCampo->id) {
                            $filaDonante->Campo_Misionero = $filaCampo->descripcion;
                        }

                    }
                }

                $sheet->freezeFirstRow();
                $sheet->cells('A1:L1', function ($cells) {

                    // manipulate the range of cells
                    $cells->setBackground('#0066CC');
                    $cells->setFontSize(14);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');

                });


                $sheet->fromArray($ListDonates);

            });
            $excel->sheet('Donaciones', function ($sheet) {
                $ListDonantes = CE_Donantes::all();
                $ListProyectos = CE_Proyecto::all();
                $ListEstados = CEEstados::all();
//
                $donaciones = CE_Donaciones::select(
                    'idDonante as Donante',
                    'idProyecto as Proyecto',
                    'codDonacion as Codigo_Donacion',
                    'cantidad as Cantidad_Promesa',
                    'nroCuota as Nro_Cuotas',
                    'abono as Total_Depositado',
                    'restante as Restante',
                    'frecuencia as Frecuencia_Deposito',
                    'fechain as Fecha_Inicio_Promesa',
                    'fechaFinal as Fecha_Final_Promesa',
                    'modalidad as Modalidad_Deposito',
                    'idEstado as Estado_Donacion',
                    'created_at as Fecha_registro_en_Sistema',
                    'updated_at as Fecha_ultima_modificación'
                )->get();

                foreach ($donaciones as $filaDonacion) {
                    foreach ($ListEstados as $filaEstado) {
                        if ($filaDonacion->Estado_Donacion == $filaEstado->id) {
                            $filaDonacion->Estado_Donacion = $filaEstado->nombre;
                        }
                    }
                    foreach ($ListProyectos as $filaProyecto) {

                        if ($filaDonacion->Proyecto == $filaProyecto->id) {
                            $filaDonacion->Proyecto = $filaProyecto->nombre;
                        }

                    }
                    foreach ($ListDonantes as $filaDonante) {

//                        'apellidoPaterno', 'apellidoMaterno'


                        if ($filaDonacion->Donante == $filaDonante->id) {
                            $filaDonacion->Donante = strtoupper($filaDonante->apellidoPaterno) .
                                " " . strtoupper($filaDonante->apellidoMaterno) .
                                " ," . ucwords($filaDonante->nombres);
                        }

                    }
                }

                $sheet->freezeFirstRow();
                $sheet->cells('A1:M1', function ($cells) {

                    // manipulate the range of cells
                    $cells->setBackground('#0066CC');
                    $cells->setFontSize(14);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');

                });
                $sheet->fromArray($donaciones);


            });
            $excel->sheet('Promesas', function ($sheet) {

                $ListProyectos = CE_Proyecto::all();

                $ListDetalleDonacion = CE_DetalleDonacion::select(
                    'id as Orden_Registro',
                    'idDonacion as Codigo_Promesa_Nombres_Donante',
                    'campoMisioneroId as Campo_Misionero',
                    'fecha as Fecha_Deposito',
                    'nroVaucher as Nro_Voucher',
                    'abono as Deposito'

                )->get();

                foreach ($ListDetalleDonacion as $filaDetalle) {
                    $campoMisionero = CE_CampoMisionero::find($filaDetalle->Campo_Misionero);
                    $filaDetalle->Campo_Misionero = $campoMisionero->descripcion;
                    $donacion = CE_Donaciones::find($filaDetalle->Codigo_Promesa_Nombres_Donante);
                    $donante = CE_Donantes::find($donacion->idDonante);
                    $filaDetalle->Codigo_Promesa_Nombres_Donante = $donacion->codDonacion .
                        " " . strtoupper($donante->apellidoPaterno) .
                        " " . strtoupper($donante->apellidoMaterno) .
                        " ," . ucwords($donante->nombres);
                }

                $sheet->freezeFirstRow();
                $sheet->cells('A1:F1', function ($cells) {

                    // manipulate the range of cells
                    $cells->setBackground('#0066CC');
                    $cells->setFontSize(14);
                    $cells->setFontColor('#ffffff');
                    $cells->setFontWeight('bold');

                });
                $sheet->fromArray($ListDetalleDonacion);

            });
        })->export('xls');

    }

    protected $listaDonantesImportados;

    public function importDonante(Request $request)
    {

        if ($request->excel != null) {
            Excel::selectSheets('Donantes')->load($request->excel, function ($reader) {
                $excel = $reader->get();
                $reader->each(function ($row) {
                    if ($row != null) {
                        $donante = new CE_Donantes();
                        $fechaActualf = date("d-m-Y H:i:s");
                        $añoActual = date("Y", strtotime($fechaActualf));

                        $donante->codDonante = $añoActual . $row->dni;
                        $donante->nombres = $row->nombres;
                        $donante->apellidoPaterno = $row->apellidopaterno;
                        $donante->apellidoMaterno = $row->apellidomaterno;
                        $donante->dni = $row->dni;


                        if ($row->celular != null) {
                            $donante->celular = $row->celular;
                        } else {
                            $donante->celular = "-";
                        }

                        if ($row->celular != null) {
                            $donante->email = $row->email;
                        } else {
                            $donante->email = "-";
                        }


                        if ($row->direccion != null) {
                            $donante->direccion = $row->direccion;
                        } else {
                            $donante->direccion = "-";
                        }

                        if ($row->fechanac != null) {
                            $donante->fechaNac = $row->fechanac;
                        } else {
                            $donante->fechaNac = "-";
                        }


                        if ($row->fechareg != null) {
                            $donante->fechaReg = $row->fechareg;
                        } else {
                            $donante->fechaReg = $fechaActualf;
                        }

                        $donante->idEstado = $row->estado;
                        $donante->cargo = $row->cargo;
                        $donante->campoMisiId = $row->campomisiid;

                        dd($donante);
//                        $donante->save();
                    }
                });
            });
            return redirect()->route('donantes.index');
        } else {
            return redirect()->route('donantes.index');
        }
    }


    public function importDonante2(Request $request)
    {
        if ($request->excel != null) {
            Excel::selectSheets('Donantes')->load($request->excel, function ($reader) {
                $excel = $reader->get();
                $reader->each(function ($row) {
                    if ($row != null) {
                        $donante = new CE_Donantes();
                        $hoy = date("Y-m-d H:i:s");
                        $año = date("Y", strtotime($hoy));
                        $donante->codDonante = $año . $row->dni;
                        $donante->nombres = $row->nombres;
                        $donante->apellidoPaterno = $row->apellidopaterno;
                        $donante->apellidoMaterno = $row->apellidomaterno;
                        $donante->dni = $row->dni;
                        $donante->celular = $row->celular;
                        $donante->email = $row->email;
                        $donante->direccion = $row->direccion;
                        $donante->fechaNac = $row->fechanac;
                        $donante->fechaReg = $hoy;
                        $donante->idEstado = $row->estado;
                        $donante->cargo = $row->cargo;
                        $donante->campoMisiId = $row->campomisiid;
                        $donante->save();
                    }
                });
            });
            $mensaje = "Importacion Correcta";
            $Donantes = CE_Donantes::orderBy('nombres', 'ASC')->paginate();
            $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
            $listDonantes = CE_Donantes::nombres($request->get('nombres'))->orderBy('apellidoPaterno', 'ASC')->where('idEstado', '=', 1)->paginate();
            return view('donantes.index', compact('listDonantes', 'camposMisioneros', 'Donantes', 'mensaje'));
//            return redirect()->route('donantes.index')
        } else {
            $mensaje = "No ha Seleccionado Archivo";
            $Donantes = CE_Donantes::orderBy('nombres', 'ASC')->paginate();
            $camposMisioneros = CE_CampoMisionero::orderBy('descripcion', 'ASC')->get();
            $listDonantes = CE_Donantes::nombres($request->get('nombres'))->orderBy('apellidoPaterno', 'ASC')->where('idEstado', '=', 1)->paginate();
            return view('donantes.index', compact('listDonantes', 'camposMisioneros', 'Donantes', 'mensaje'));
        }
    }


    public function importDonacion(Request $request)
    {
        $this->idDon = $request->idDonanteExcel;

        if ($request->excel != null) {
            Excel::selectSheets('Promesas')->load($request->excel, function ($reader) {

                $reader->each(function ($row) {

//                    dd($row->donante);
                    if ($row->donante != null) {

                        $donacionMayor = CE_Donaciones::max('id');

                        $donancion = new CE_Donaciones();

                        $fechaActualf = date("d-m-Y H:i:s");
                        $idSig = $donacionMayor + 1;

                        if ($row->fechainicio == null) {
                            $añoActual = date("d-m-Y H:i:s", strtotime($fechaActualf));
                            $añoRegistro = date("Y", strtotime($añoActual));
                        } else {
                            $añoRegistroExcel = date("d-m-Y H:i:s", strtotime($row->fechainicio));
                            $añoRegistro = date("Y", strtotime($añoRegistroExcel));//                            dd($añoRegistro);
                        }


                        if ($row->codigodonacion == null) {
                            $donancion->codDonacion = $añoRegistro . $row->nrocuota . $idSig;
                        } else {
                            $donancion->codDonacion = $añoRegistro . $row->nrocuota . $idSig;
                        }


//                        dd($donancion->codDonacion);

                        $donancion->cantidad = $row->cantidad;


//                        dd($row->cantidad);
                        $donancion->nroCuota = $row->nrocuota;


//                        $donancion->abono = $row->abono;
                        if ($row->abono != null) {
                            $donancion->abono = $row->abono;
                        } else {
                            $donancion->abono = 0;
                        }
//                        $donancion->restante = $row->restante;
                        if ($row->restante != null) {
                            $donancion->restante = $row->restante;
                        } else {
                            $donancion->restante = 0;
                        }


                        if ($row->frecuencia != null) {
                            $donancion->frecuencia = $row->frecuencia;
                        } else {
                            $donancion->frecuencia = "-";
                        }


                        $donancion->fechain = $row->fechainicio;

                        if ($row->fechainicio != null) {
                            $donancion->fechain = $row->fechainicio;
                        } else {
                            $donancion->fechain = $fechaActualf;
                        }

                        if ($row->fechafinal != null) {
                            $donancion->fechaFinal = $row->fechafinal;
                        } else {
                            $donancion->fechaFinal = "";
                        }

                        if ($row->modalidad != null) {
                            $donancion->modalidad = $row->modalidad;
                        } else {
                            $donancion->modalidad = "-";
                        }

                        if ($row->donante != null) {
                            $donancion->idDonante = $row->donante;
                        } else {
                            $donancion->idDonante = $donacionMayor;
                        }

                        if ($row->proyecto != null) {
                            $donancion->idProyecto = $row->proyecto;
                        } else {
                            $donancion->idProyecto = 1;
                        }

                        if ($row->estado != null) {
                            $donancion->idEstado = $row->estado;
                        } else {
                            $donancion->idEstado = 5;
                        }

//                        dd($donancion);

                        $donancion->save();
                    }
                });
            });
            return redirect()->route('donantes.index');
        } else {
            return redirect()->route('donantes.index');

        }
    }

    public function importDetalle(Request $request)
    {
        $this->idDon = $request->idDonacionExcel;


        if ($request->excel != null) {
            Excel::selectSheets('DetallePromesa')->load($request->excel, function ($reader) {
                $excel = $reader->get();
//                dd($reader->get());

                $reader->each(function ($row) {
                    if ($row->iddonacion != null) {

//                        dd($row);
                        $CuotasPromesas = new CE_DetalleDonacion();
                        $fechaActualf = date("d-m-Y H:i:s");
                        $añoActual = date("Y", strtotime($fechaActualf));
                        $CuotasPromesas->abono = $row->abono;

                        if ($row->fechadeposito != null) {
                            $CuotasPromesas->fecha = $row->fechadeposito;
                        } else {
                            $CuotasPromesas->fecha = "-";
                        }

                        $CuotasPromesas->campoMisioneroId = $row->campomis;

                        if ($row->nroVaucher != null) {
                            $CuotasPromesas->nroVaucher = $row->nrovoucher;
                        } else {
                            $CuotasPromesas->nroVaucher = "-";
                        }

                        $CuotasPromesas->idDonacion = $row->iddonacion;


                        $CuotasPromesas->save();

                        $nuevoAbono = 0;

                        $ListaAbonosPromesa = CE_DetalleDonacion::all()->where('idDonacion', '=', $row->iddonacion);

                        foreach ($ListaAbonosPromesa as $abonoFila) {
                            $nuevoAbono = $abonoFila->abono + $nuevoAbono;
                        }

                        $Donacion = CE_Donaciones::find($row->iddonacion);
                        $Donacion->abono = $nuevoAbono;
                        $Donacion->restante = $Donacion->cantidad - $nuevoAbono;

//                        dd($row);
                        $Donacion->save();


                    }

                });

            });

            return redirect()->route('donantes.index');
        } else {
            return redirect()->route('donantes.index');

        }
    }
}
