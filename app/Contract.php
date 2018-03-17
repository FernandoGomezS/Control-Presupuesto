<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_contract', 'stage_id','type_stage_id','responsable_id','employee_id','budget_id','function','sport','program','position','matches_working','duration','category','date_signature_contract','number_memo_contract','date_memo_contract','quotas','date_start','date_finish','amount_total','amount_paid','date_resign','stage_id'
    ];

     public function employees()
    {
        return $this->belongsTo('App\Employee','employee_id');
    }
     public function responsables()
    {
        return $this->belongsTo('App\Responsable','responsable_id');
    }
     public function type_stages()
    {
        return $this->belongsTo('App\TypeStage','type_stage_id');
    }
    public function stages()
    {
        return $this->belongsTo('App\Stage','stage_id');
    }
}
