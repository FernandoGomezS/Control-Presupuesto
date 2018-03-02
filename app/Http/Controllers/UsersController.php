<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use Validator;



class UsersController extends Controller
{
	public function create()
	{
		if(auth()->user()->hasRole('Administrador')){
			return view('users.create')->with('roles',Role::get());
		}
	}
	public function users()
	{
		if(auth()->user()->hasRole('Administrador')){
			return $this->search('all');
		}
	}


	public function search()
	{
		if(auth()->user()->hasRole('Administrador')){
			$userAll= User::all();

			return view('users.search')->with('users',$userAll);
		}
	}

	public function edit(User $user)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->id == $user->id){

			return view('users.edit')->with('user',$user)->with('roles',Role::get());
		}
	}

	public function show(User $user)
	{
		if(auth()->user()->hasRole('Administrador') || auth()->user()->id == $user->id){

			return view('users.show')->with('user',$user);
		}
	}

	public function perfil()
	{
		return view('users.show');
	}

	public function store(Request $request)
	{
		if(auth()->user()->hasRole('Administrador')){

			$validator = Validator::make($request->all(), [
				'name' => 'required|max:255',
				'last_name' => 'required|max:255',
				'email'=>'required|email|unique:users,email',         
			]);			
			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput(
    $request->except('password')
);;
			}			
			else{
				$data= request()->all();
				if($data['role_id']==2){
					$role = Role::where('name', 'Usuario')->first();
				}else{
					$role = Role::where('name', 'Administrador')->first();
				}     
				$user = new User();
				$user->name = $data['name'];
				$user->last_name = $data['last_name'];
				$user->email = $data['email'];
				$user->password = bcrypt($data['password']);
				$user->save();
				$user->roles()->attach($role);
				flash('Se Creó Correctamente el usuario.')->success();
				return redirect()->route('users.search');
			}
		}

	}

	public function update(Request $request)
	{		

		if(auth()->user()->hasRole('Administrador') || auth()->user()->id == $request->id ){

			$validator = Validator::make($request->all(), [
				'name' => 'required|max:255',
				'last_name' => 'required|max:255',
				'email' => 'required|email|max:255',          
			]);
			$user = User::findOrFail($request->id);
			
			$validator->sometimes('email', 'unique:users', function ($input) use ($user) {

				return strtolower($input->email) != strtolower($user->email);
			});

			if ($validator->fails()) {
				flash('Error, Por favor Ingresa valores correctos.')->error();
				return redirect()->back()->withErrors($validator->errors())->withInput(
    $request->except('password')
);
			}			
			else{

				$user->name = $request->get('name');
				$user->email = $request->get('email'); 
				$user->last_name = $request->get('last_name');           
				if ($request->has('password')) {
					$user->password = bcrypt($request->get('password'));
				}
				$user->save();
				$user->roles()->detach();
				if($request['role_id']==2){
					$role = Role::where('name', 'Usuario')->first();
				}elseif ($request['role_id']==1){

					$role = Role::where('name', 'Administrador')->first();
				}  
				$user->roles()->attach($role);

				if(auth()->user()->hasRole('Administrador') ){
					flash('Se Modificó Correctamente el Usuario '.$user->name.'.')->success();
					return redirect()->intended(route('users.search'));
				}
				else{
					flash('Se Modificó Correctamente el Usuario '.$user->name.'.')->success();
					return view('web.index');;
				}
			}

		}
	}

	public function destroy(User $user){



		if(auth()->user()->hasRole('Administrador'))
		{

			$user->delete();
			flash('Se eliminó Correctamente el Usuario.')->success();
			return redirect()->intended(route('users.search'));
		}
	}

}
