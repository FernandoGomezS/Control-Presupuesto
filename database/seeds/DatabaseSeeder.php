<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//borra la base de datos
    	$this->truncateTables([
    		'users','contracts','afps','healths','employees','roles','role_user','responsables','budgets','components','stages','type_stages','quotas'

    	]);
    	//llama a las clases para cargar  BD
         $this->call(BudgetsSeeder::class);
         $this->call(ComponentsSeeder::class);
         $this->call(Types_stagesSeeder::class);
         $this->call(StagesSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(ResponsablesSeeder::class);
         $this->call(AfpsSeeder::class);
         $this->call(HealthsSeeder::class);

    }

    protected function truncateTables(array $tables)
    {

    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    	foreach ($tables as $value) {
    		DB::table($value)->truncate();
    	}    	
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
