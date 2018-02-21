<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ResponsablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responsables')->insert([
        	'names'=>'Responsable 1 ',
        	'last_name'=>'Apellido 1 ',
        	'last_name_mother'=>'Apellido 2 ',
        	'birth_date'=>Carbon::now(),
        	'rut'=>'12.345.606-5',       	
        	'phone'=>12312332,
        	'address'=>'Regidor lozano #1089',
        	'email'=>'responsable@gmail.com' 
        ]);
    }
}
