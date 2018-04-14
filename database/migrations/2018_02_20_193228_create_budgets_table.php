<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index(); 
            $table->bigInteger('year')->unsigned()->unique();
            $table->bigInteger('amount_total')->unsigned();
            $table->bigInteger('amount_spent')->unsigned()->nullable();
            $table->bigInteger('contracted_employees')->unsigned()->nullable();                    
            $table->bigInteger('numbers_employees')->unsigned(); 
            $table->enum('state', ['Activo', 'Inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
}
