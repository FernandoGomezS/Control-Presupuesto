<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Types_stagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//Componente Escolar
       DB::table('type_stages')->insert([
        	'name'=>'Comunal',
        	'component_id'=>'1'	
        ]);
         DB::table('type_stages')->insert([
        	'name'=>'Provincial',
        	'component_id'=>'1'	
        ]);
          DB::table('type_stages')->insert([
        	'name'=>'Regional',
        	'component_id'=>'1'	
        ]);  
           DB::table('type_stages')->insert([
        	'name'=>'Nacional',
        	'component_id'=>'1'	
        ]);  
             DB::table('type_stages')->insert([
        	'name'=>'Juegos Pre-Deportivos escolares',
        	'component_id'=>'1'	
        ]);  
             //Componente Federado
       DB::table('type_stages')->insert([
        	'name'=>'Preparación',
        	'component_id'=>'2'	
        ]);
         DB::table('type_stages')->insert([
        	'name'=>'Participación',
        	'component_id'=>'2'	
        ]);
               //Componente Ligas de Educación superior
       DB::table('type_stages')->insert([
        	'name'=>'Regional',
        	'component_id'=>'3'	
        ]);
         DB::table('type_stages')->insert([
        	'name'=>'Coordinacion LDES',
        	'component_id'=>'3'	
        ]);
             
    }
}
