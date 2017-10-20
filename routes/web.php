<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\CEEstados;

Route::get('/', function () {

    $Estados = CEEstados::all()->where('tipoParent', '=', 'Usuario');
    return view('index', compact('Estados'));
});
Route::resource('donantes', 'CEDonantesController');
Route::resource('proyectos', 'CEProyectoController');
Route::resource('detalledonacion', 'CEDetalleDonacionController');
Route::resource('usuarios', 'UsuariosController');
Route::resource('donaciones', 'CEDonacionesController');
Route::resource('camposMisioneros', 'CECampoMisioneroController');
Route::resource('pdfs', 'PdfController');
Route::get('donaciones/{idDonante}/createToDonante', 'CEDonacionesController@createToDonante')->name('donaciones.createToDonante');
Route::get('detalledonacion/{idDonacion}/createToDonacion', 'CEDetalleDonacionController@createToDonacion')->name('detalledonacion.createToDonacion');
Route::get('donaciones/finalizadas/index', 'CEDonacionesController@indexToFinalizadas')->name('donaciones.finalizadas.index');
Route::get('donantesInactivo', 'CEDonantesController@indexInactivo')->name('donantes.indexInactivo');
Route::post('login', 'UsuariosController@login')->name('usuarios.login');
Route::get('excelDonaciones', 'ExcelController@excelDonaciones')->name('excel.Donaciones');
Route::get('excelDonantes', 'ExcelController@excelDonantes')->name('excel.donantes');
Route::get('excelPromesas', 'ExcelController@excelPromesas')->name('excel.promesas');
Route::get('pdfs/{idDonante}/{idDonacion}/showPromesa', 'PdfController@showPromesa')->name('pdfs.showPromesa');
Route::get('pdfsshowfinalizadas', 'PdfController@showFinalizadas')->name('pdfs.showFinalizadas');
Route::post('/import-excel', 'ExcelController@importDonante')->name('excel.import.donante');
Route::post('/import-excel/{idDonante}', 'ExcelController@importDonacion')->name('excel.import.donacion');
Route::post('/import-excel-detalle/{idDonacion}', 'ExcelController@importDetalle')->name('excel.import.detalle');
Route::get('foo', function () {
    return csrf_token(); // null
});

Route::group(['middleware' => 'web'], function () {
    Route::get('bar', function () {
        return csrf_token(); // works
    });
});
//Route::resource('excel','ExcelController');