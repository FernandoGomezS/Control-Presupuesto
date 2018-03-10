<?php

use Illuminate\Database\Seeder;
use App\Budget;

class BudgetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $budget = new Budget();
        $budget->year = '2018';
        $budget->amount_total = 200000000;
        $budget->amount_spent = 0;
        $budget->contracted_employees = 0;        
        $budget->numbers_employees = 150;
        $budget->state = 'Activo';
        $budget->save();
    }
}
