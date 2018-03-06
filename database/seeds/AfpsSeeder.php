<?php

use Illuminate\Database\Seeder;
use App\Afp;

class AfpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $afp = new Afp();
        $afp->name = 'Capital';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'Cuprum';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'Habitat';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'Modelo';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'Plan Vital';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'Provida';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'Pensionado';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'No tiene';       
        $afp->save();

        $afp = new Afp();
        $afp->name = 'Otra';       
        $afp->save();
    }
}
