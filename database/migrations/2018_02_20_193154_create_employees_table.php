<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index(); 
            $table->string('names');
            $table->string('last_name');
            $table->string('last_name_mother');
            $table->date('birth_date');    
            $table->string('rut')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('commune');
            $table->enum('afp', ['Transitorio', 'Permanente']);
            $table->enum('Health', ['Transitorio', 'Permanente']);
            $table->string('profession');
            $table->enum('quality_studies', ['Tecnico', 'Profesional','Experto']);
            $table->bigInteger('semesters')->unsigned()->nullable();
            $table->string('url_certificate');
            $table->string('url_identification');  
            $table->date('upgrade_date');           
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
        Schema::dropIfExists('employees');
    }
}
