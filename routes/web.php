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

Route::get('/', 'HomeController@index');
Route::auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['middleware' => ['auth','web']], function()
{




	//rutas usuarios
	Route::get('usuarios/', 'UsersController@users')->name('users');
	Route::get('usuarios/crear', 'UsersController@create')->name('users.create');	
	Route::get('usuarios/buscar', 'UsersController@search')->name('users.search');
	Route::get('usuarios/editar/{user}', 'UsersController@edit')->name('users.edit');
	Route::get('usuarios/ver/{user}', 'UsersController@show')->name('users.show');
	Route::get('usuarios/perfil', 'UsersController@perfil')->name('users.perfil');
	//rutas empleados
	Route::get('empleados/', 'Employeesontroller@employees')->name('employees');
	Route::get('empleados/crear', 'Employeesontroller@create')->name('employees.create');
	Route::get('empleados/buscar', 'Employeesontroller@search')->name('employees.search');
	Route::get('empleados/editar', 'Employeesontroller@edit')->name('employees.edit');
	Route::get('empleados/ver', 'Employeesontroller@show')->name('employees.show');
	//rutas responsables
	Route::get('responsables/', 'ResponsablesController@responsables')->name('responsables');
	Route::get('responsables/crear', 'ResponsablesController@create')->name('responsables.create');
	Route::get('responsables/buscar', 'ResponsablesController@search')->name('responsables.search');
	Route::get('responsables/editar', 'ResponsablesController@edit')->name('responsables.edit');
	Route::get('responsables/ver', 'ResponsablesController@show')->name('responsables.show');
	//rutas presupuesto
	Route::get('presupuestos/', 'BudgetsController@budgets')->name('budgets');
	Route::get('presupuestos/crear', 'BudgetsController@create')->name('budgets.create');
	Route::get('presupuestos/buscar', 'BudgetsController@search')->name('budgets.search');
	Route::get('presupuestos/editar', 'BudgetsController@edit')->name('budgets.edit');
	Route::get('presupuestos/ver', 'BudgetsController@show')->name('budgets.show');
	//rutas contratos
	Route::get('contratos/', 'ContractsController@contracts')->name('contracts');
	Route::get('contratos/crear', 'ContractsController@create')->name('contracts.create');
	Route::get('contratos/buscar', 'ContractsController@search')->name('contracts.search');
	Route::get('contratos/editar', 'ContractsController@edit')->name('contracts.edit');
	Route::get('contratos/ver', 'ContractsController@show')->name('contracts.show');
	});