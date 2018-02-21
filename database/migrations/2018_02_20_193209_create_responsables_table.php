<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index(); 
            $table->string('names');
            $table->string('last_name');
            $table->string('last_name_mother');
            $table->date('birth_date');    
            $table->string('rut')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');    
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
        Schema::dropIfExists('responsables');
    }
}
