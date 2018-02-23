<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_contract', 'stage_id','type_stage_id','responsable_id','employee_id','budget_id','function','sport','program','position','matches_working','duration','category','date_signature_contract','number_memo_contract','date_memo_contract','quotas','date_start','date_finish','amount_total','amount_paid','date_resign'
    ];

}
