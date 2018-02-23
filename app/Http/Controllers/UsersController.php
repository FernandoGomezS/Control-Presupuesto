<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
   public function create()
    {
    	return view('users.create');
    }
    public function users()
    {
         return $this->search('all');
    }


    public function search()
    {
        $userAll= User::all();
        
    	return view('users.search')->with('users',$userAll);
    }

    public function edit(User $user)
    {
    	return view('users.edit');
    }

    public function show(User $user)
    {
        return view('users.show')->with('user',$user);
    }
    public function perfil()
    {
        return view('users.show');
    }
}
