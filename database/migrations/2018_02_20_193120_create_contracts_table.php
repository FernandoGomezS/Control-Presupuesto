<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index(); 
            $table->enum('state_contract', ['Pagado', 'Contratado','A Pagar','Firma contrato','Renuncia']);
            $table->bigInteger('stage_id')->unsigned()->nullable();
            $table->bigInteger('type_stage_id')->unsigned();
            $table->bigInteger('responsable_id')->unsigned()->index();  
            $table->bigInteger('employee_id')->unsigned()->index();
            $table->bigInteger('budget_id')->unsigned()->onDelete('cascade');                
            $table->enum('function', ['Control de Competencia', 'Monitor','Gestor Territorial','Administrador Contable','Coordimador','Encargado','Apoyo al Programa','Técnico','Ayudante Técnico','Delegado','Mecánico']);
            $table->string('sport'); //deporte
            $table->string('program'); //programa
            $table->string('position');
            $table->string('matches_working')->nullable();             
            $table->enum('duration', ['Transitorio', 'Permanente']);
            $table->enum('category', ['Sub14', 'Segunda Categoria'])->nullable();
            

            $table->date('date_signature_contract')->nullable();
            $table->bigInteger('number_memo_contract')->unsigned()->nullable();
            $table->date('date_memo_contract')->nullable();

            $table->bigInteger('differential_month_amount')->unsigned()->nullable();// monto mes diferencial
            $table->string('differential_month')->nullable();//mes diferencial

            $table->bigInteger('quotas')->unsigned(); //cuotas
            $table->bigInteger('hours')->unsigned(); //horas
            $table->date('date_start');
            $table->date('date_finish');
            $table->date('date_resign')->nullable();
            $table->bigInteger('amount_total')->unsigned();
            $table->bigInteger('amount_paid')->unsigned()->nullable();
            $table->bigInteger('amount_year')->unsigned();
            $table->bigInteger('amount_month')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('contracts');
    }
}
