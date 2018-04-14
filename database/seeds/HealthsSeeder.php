<?php

use Illuminate\Database\Seeder;
use App\Health;

class HealthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $health = new Health();
        $health->name = 'Fonasa';       
        $health->save();

        $health = new Health();
        $health->name = 'Banmédica';       
        $health->save();

        $health = new Health();
        $health->name = 'Habitat';       
        $health->save();

        $health = new Health();
        $health->name = 'Colmena';       
        $health->save();

        $health = new Health();
        $health->name = 'Consalud';       
        $health->save();

        $health = new Health();
        $health->name = 'Cruz Blanca';       
        $health->save();

        $health = new Health();
        $health->name = 'Mas Vida';       
        $health->save();

        $health = new Health();
        $health->name = 'Vida Tres';       
        $health->save();

        $health = new Health();
        $health->name = 'No tiene';       
        $health->save();

        $health = new Health();
        $health->name = 'Otra';       
        $health->save();
    }
}
