<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotas', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index(); 
            $table->bigInteger('stage_id')->unsigned()->nullable();
            $table->bigInteger('type_stage_id')->unsigned()->index();              
            $table->bigInteger('contract_id')->unsigned()->index(); 
            $table->bigInteger('amount')->unsigned();                        
            $table->enum('state_quota', ['Pagado','Por Pagar', 'Pendiente','A Pago','Anulada']);
            $table->bigInteger('number_certificate')->unsigned()->nullable();
            $table->date('date_to_pay')->nullable();
            $table->bigInteger('number_ticket')->unsigned()->nullable();
            $table->date('date_paid')->nullable();
            $table->bigInteger('number_memo')->unsigned()->nullable();
            $table->date('date_memo_to_pay')->nullable();  
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
        Schema::dropIfExists('quotas');
    }
}
