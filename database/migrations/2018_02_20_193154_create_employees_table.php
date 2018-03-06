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
            $table->bigInteger('afp_id')->unsigned();
            $table->bigInteger('health_id')->unsigned();
            $table->string('profession');
            $table->enum('quality_studies', ['Técnico', 'Profesional','Experto']);
            $table->bigInteger('semesters')->unsigned()->nullable();
            $table->string('url_certificate');
            $table->string('url_identification'); 
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
