<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('type_stage_id')->references('id')->on('type_stages');
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('budget_id')->references('id')->on('budgets');  
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            //
        });
    }
}
