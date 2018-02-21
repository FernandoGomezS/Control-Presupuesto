<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Tipo de etapa Comunal 
    	DB::table('stages')->insert(['name'=>'La Florida','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'La Pintana','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Pirque','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Puente Alto','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'La Reina','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Las Condes','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Lo Barnechea','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Macul','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Ñuñoa','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Peñalolén','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Providencia','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Vitacura','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Pedro Aguirre Cerda','type_stage_id'=>'1']);	
    	DB::table('stages')->insert(['name'=>'San Joaquín','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'San Miguel','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Santiago','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Buin','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Calera de Tango','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'El Bosque','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'La Cisterna','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'La Granja','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Lo Espejo	','type_stage_id'=>'1']);	
    	DB::table('stages')->insert(['name'=>'Paine','type_stage_id'=>'1']);	
    	DB::table('stages')->insert(['name'=>'San Bernardo','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'San Ramón','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Cerrillos','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Cerro Navia','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Estación Central','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Lo Prado','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Maipú','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Pudahuel','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Quinta Normal','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Renca','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Alhué','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Curacaví','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'El Monte','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Isla de Maipo','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'María Pinto','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Melipilla','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Padre Hurtado','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Peñaflor','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'San Pedro','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Talagante','type_stage_id'=>'1']);	
    	DB::table('stages')->insert(['name'=>'Colina','type_stage_id'=>'1']);	
    	DB::table('stages')->insert(['name'=>'Conchalí','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Huechuraba','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Independencia','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Lampa','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Quilicura','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Recoleta','type_stage_id'=>'1']);		
    	DB::table('stages')->insert(['name'=>'Til Til','type_stage_id'=>'1']);	

    	//Tipo de etapa Provincial
    	DB::table('stages')->insert(['name'=>'CORDILLERA','type_stage_id'=>'2']);			
    	DB::table('stages')->insert(['name'=>'TALAGANTE - MELIPILLA	','type_stage_id'=>'2']);
    	DB::table('stages')->insert(['name'=>'SUR','type_stage_id'=>'2']);		
    	DB::table('stages')->insert(['name'=>'NORTE','type_stage_id'=>'2']);		
    	DB::table('stages')->insert(['name'=>'CENTRO','type_stage_id'=>'2']);		
    	DB::table('stages')->insert(['name'=>'ORIENTE','type_stage_id'=>'2']);		
    	DB::table('stages')->insert(['name'=>'PONIENTE','type_stage_id'=>'2']);

    	//Tipo de etapa Regional
    	DB::table('stages')->insert(['name'=>'ATLETISMO ','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'NATACIÓN','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'TENIS DE MESA','type_stage_id'=>'3']);		
    	DB::table('stages')->insert(['name'=>'CICLISMO','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'FÚTBOL','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'BÁSQUETBOL','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'VOLEIBOL','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'BALONMANO','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'ATLETISMO ADAPTADO','type_stage_id'=>'3']);	
    	DB::table('stages')->insert(['name'=>'FUTSAL','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'JUDO','type_stage_id'=>'3']);			
    	DB::table('stages')->insert(['name'=>'OTROS','type_stage_id'=>'3']);			

    	//Tipo de etapa Nacional	
    	DB::table('stages')->insert(['name'=>'ATLETISMO ','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'NATACIÓN','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'TENIS DE MESA','type_stage_id'=>'4']);		
    	DB::table('stages')->insert(['name'=>'CICLISMO','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'FÚTBOL','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'BÁSQUETBOL','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'VOLEIBOL','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'BALONMANO','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'ATLETISMO ADAPTADO','type_stage_id'=>'4']);	
    	DB::table('stages')->insert(['name'=>'FUTSAL','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'JUDO','type_stage_id'=>'4']);			
    	DB::table('stages')->insert(['name'=>'OTROS','type_stage_id'=>'4']);		

    	//Tipo de etapa Juegos Pre-Deportivos escolares
    	DB::table('stages')->insert(['name'=>'Eventos ','type_stage_id'=>'5']);			
    	DB::table('stages')->insert(['name'=>'Ligas','type_stage_id'=>'5']);			
    	DB::table('stages')->insert(['name'=>'Coordinación JPRED','type_stage_id'=>'5']);

    }
}
