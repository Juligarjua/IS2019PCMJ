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
    return view('welcome');
});
//Poner las acciones definidas por el programador antes del CRUD por defecto que monta Laravel
Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');


Route::resource('medicos', 'MedicoController');

Route::get('pacientes/pacienteyEspecialidad', 'PacienteController@pacienteyEspecialidad')->name('pacientes.pacienteyEspecialidad');
Route::resource('pacientes', 'PacienteController');
Route::resource('enfermedades', 'EnfermedadController');
Route::resource('medicamentos', 'MedicamentoController');
Route::resource('tratamientos', 'TratamientoController');
Route::resource('centros', 'CentroController');
Route::resource('citas', 'CitaController');





Auth::routes();

Route::get('/home', 'HomeController@index');

