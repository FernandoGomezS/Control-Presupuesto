<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        $role_user = Role::where('name', 'Usuario')->first();
        $role_admin = Role::where('name', 'Administrador')->first();

     
        $user = new User();
        $user->name = 'User';
        $user->last_name = 'Last name';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Fernando';
        $user->last_name = 'Gómez}';
        $user->email = 'fernandorgs1089@gmail.com';
        $user->password = bcrypt('12345');
        $user->save();
        $user->roles()->attach($role_admin);     
    }
}
