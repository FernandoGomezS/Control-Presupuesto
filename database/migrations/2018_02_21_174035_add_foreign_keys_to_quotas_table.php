<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToQuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotas', function (Blueprint $table) {           
            $table->foreign('contract_id')->references('id')->on('contracts');  
            $table->foreign('type_stage_id')->references('id')->on('contracts');              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotas', function (Blueprint $table) {
            //
        });
    }
}
