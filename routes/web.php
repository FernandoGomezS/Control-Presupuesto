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
	Route::post('usuarios/crear', 'UsersController@store')->name('users.store');
	Route::post('usuarios/editar/', 'UsersController@update')->name('users.update');
	Route::delete('usuarios/borrar/{user}', 'UsersController@destroy')->name('users.destroy');

	//rutas empleados
	Route::get('empleados/', 'EmployeesController@employees')->name('employees');
	Route::get('empleados/crear', 'EmployeesController@create')->name('employees.create');
	Route::get('empleados/buscar', 'EmployeesController@search')->name('employees.search');
	Route::get('empleados/editar/{employee}', 'EmployeesController@edit')->name('employees.edit');
	Route::get('empleados/ver/{employee}', 'EmployeesController@show')->name('employees.show');
	Route::post('empleados/crear', 'EmployeesController@store')->name('employees.store');
	Route::post('empleados/editar/', 'EmployeesController@update')->name('employees.update');
	Route::delete('empleados/borrar/{employee}', 'EmployeesController@destroy')->name('employees.destroy');
	//ajax contratos empleados
	Route::get('empleados/buscar/empleado', 'EmployeesController@searchEmployee');

	//rutas responsables
	Route::get('responsables/', 'ResponsablesController@responsables')->name('responsables');
	Route::get('responsables/crear', 'ResponsablesController@create')->name('responsables.create');
	Route::get('responsables/buscar', 'ResponsablesController@search')->name('responsables.search');
	Route::get('responsables/editar/{responsable}', 'ResponsablesController@edit')->name('responsables.edit');
	Route::get('responsables/ver/{responsable}', 'ResponsablesController@show')->name('responsables.show');
	Route::post('responsables/crear', 'ResponsablesController@store')->name('responsables.store');
	Route::post('responsables/editar/', 'ResponsablesController@update')->name('responsables.update');
	Route::delete('responsables/borrar/{responsable}', 'ResponsablesController@destroy')->name('responsables.destroy');

	//rutas presupuesto
	Route::get('presupuestos/', 'BudgetsController@budgets')->name('budgets');
	Route::get('presupuestos/crear', 'BudgetsController@create')->name('budgets.create');
	Route::get('presupuestos/buscar', 'BudgetsController@search')->name('budgets.search');
	Route::get('presupuestos/editar/{budget}', 'BudgetsController@edit')->name('budgets.edit');
	//Route::get('presupuestos/ver', 'BudgetsController@show')->name('budgets.show');
	Route::post('presupuestos/crear', 'BudgetsController@store')->name('budgets.store');
	Route::post('presupuestos/editar/', 'BudgetsController@update')->name('budgets.update');
	Route::delete('presupuestos/borrar/{budget}', 'BudgetsController@destroy')->name('budgets.destroy');

	//rutas contratos
	Route::get('contratos/', 'ContractsController@contracts')->name('contracts');
	Route::get('contratos/crear', 'ContractsController@create')->name('contracts.create');
	Route::get('contratos/buscar', 'ContractsController@search')->name('contracts.search');
	Route::get('contratos/editar/{contract}', 'ContractsController@edit')->name('contracts.edit');
	Route::get('contratos/ver/{contract}', 'ContractsController@show')->name('contracts.show');
	Route::post('contratos/crear', 'ContractsController@store')->name('contracts.store');
	Route::post('contratos/editar/', 'ContractsController@update')->name('contracts.update');
	Route::delete('contratos/borrar/{contract}', 'ContractsController@destroy')->name('contracts.destroy');
	Route::post('contratos/editar/estado/{contract}', 'ContractsController@updatestate')->name('contracts.updateState');
	//ajax contratos
	Route::get('contratos/buscar/competencia', 'ContractsController@searchComponent');
	Route::get('contratos/buscar/tipos', 'ContractsController@searchTypes');
	Route::get('contratos/buscar/presupuesto', 'ContractsController@searchBudget');
 	//pdf
 	Route::get('contratos/pdf/{contract}', 'ContractsController@createPdf')->name('contracts.pdf');
 	//excel
 	Route::get('contratos/excel/{budget}', 'ContractsController@createExcel')->name('contracts.excel');
	//rutas cuota
	Route::get('cuotas/editar/{contract}', 'QuotasController@edit')->name('quotas.edit');
	Route::post('cuotas/editar/{quota}', 'QuotasController@update')->name('quotas.update');
	
});