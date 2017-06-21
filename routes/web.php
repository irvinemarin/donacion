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
Route::get('/', function () {
    return view('index');
});
Route::resource('donantes', 'CEDonantesController');
Route::resource('proyectos', 'CEProyectoController');
Route::resource('detalledonacion', 'CEDetalleDonacionController');
Route::get('donaciones/{idDonante}/createToDonante', 'CEDonacionesController@createToDonante')->name('donaciones.createToDonante');
Route::get('detalledonacion/{idDonacion}/createToDonacion', 'CEDetalleDonacionController@createToDonacion')->name('detalledonacion.createToDonacion');
Route::resource('donaciones', 'CEDonacionesController');
Route::resource('camposMisioneros', 'CECampoMisioneroController');
Route::get('donaciones/finalizadas/index', 'CEDonacionesController@indexToFinalizadas')->name('donaciones.finalizadas.index');
Route::get('donantesInactivo', 'CEDonantesController@indexInactivo')->name('donantes.indexInactivo');
Route::get('excelDonaciones', 'ExcelController@excelDonaciones')->name('excel.Donaciones');
Route::get('excelDonantes/{idDonante}', 'ExcelController@excelDonantes')->name('excel.donantes');
Route::get('excelPromesas', 'ExcelController@excelPromesas')->name('excel.promesas');

Route::resource('pdfs', 'PdfController');

Route::get('pdfs/{idDonante}/{idDonacion}/showPromesa', 'PdfController@showPromesa')->name('pdfs.showPromesa');
Route::get('pdfsshowfinalizadas', 'PdfController@showFinalizadas')->name('pdfs.showFinalizadas');

//Route::resource('excel','ExcelController');