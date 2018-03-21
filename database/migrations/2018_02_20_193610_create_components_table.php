<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->bigInteger('budget_id')->unsigned();
            $table->string('name');
            $table->bigInteger('amount_total')->unsigned();
            $table->bigInteger('amount_spent')->unsigned();
            $table->bigInteger('numbers_employees')->unsigned();
            $table->bigInteger('contracted_employees')->unsigned();
            $table->foreign('budget_id')->references('id')->on('budgets');   
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
        Schema::dropIfExists('components');
    }
}
