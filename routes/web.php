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
    return view('web.index');
});


	//rutas usuarios
	Route::get('usuarios/', 'UsuariosController@buscar');
	Route::get('usuarios/crear', 'UsuariosController@crear');
	Route::get('usuarios/buscar', 'UsuariosController@buscar');
	Route::get('usuarios/editar', 'UsuariosController@editar');
	Route::get('usuarios/ver', 'UsuariosController@ver');
	//rutas empleados
	Route::get('empleados/', 'EmpleadosController@buscar');
	Route::get('empleados/crear', 'EmpleadosController@crear');
	Route::get('empleados/buscar', 'EmpleadosController@buscar');
	Route::get('empleados/editar', 'EmpleadosController@editar');
	Route::get('empleados/ver', 'EmpleadosController@ver');
	//rutas responsables
	Route::get('responsables/', 'ResponsablesController@buscar');
	Route::get('responsables/crear', 'ResponsablesController@crear');
	Route::get('responsables/buscar', 'ResponsablesController@buscar');
	Route::get('responsables/editar', 'ResponsablesController@editar');
	Route::get('responsables/ver', 'ResponsablesController@ver');
	//rutas presupuesto
	Route::get('presupuestos/', 'PresupuestosController@buscar');
	Route::get('presupuestos/crear', 'PresupuestosController@crear');
	Route::get('presupuestos/buscar', 'PresupuestosController@buscar');
	Route::get('presupuestos/editar', 'PresupuestosController@editar');
	Route::get('presupuestos/ver', 'PresupuestosController@ver');
	//rutas contratos
	Route::get('contratos/', 'ContratosController@buscar');
	Route::get('contratos/crear', 'ContratosController@crear');
	Route::get('contratos/buscar', 'ContratosController@buscar');
	Route::get('contratos/editar', 'ContratosController@editar');
	Route::get('contratos/ver', 'ContratosController@ver');