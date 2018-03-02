<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Budget;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //Presupuesto Activo
        $budget= Budget::where('state', 'Activo')->get();       
        if($budget->isEmpty()){
            flash()->overlay('No Existe Presupuesto Activo. Ir a Presupuestos y Activar.', 'Presupuesto');
            View::share('budget_active', ''); 
        }
        else{           
            View::share('budget_active', $budget[0]->year); 
        }   
          
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
