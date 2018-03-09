<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert([
        	'name'=>'Competencia Escolar'	
        ]);
         DB::table('components')->insert([
        	'name'=>'Competencia Federada'	
        ]);
          DB::table('components')->insert([
        	'name'=>'Competencia Educación superior'	
        ]);         
    }
}
