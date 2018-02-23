<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
	   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stage_id', 'contract_id','state_quota','number_certificate','date_to_pay','number_ticket','date_paid','number_memo','date_memo_to_pay'
    ];    
}
