<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{  
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_stage_id', 'name','amount_spent','amount_total'
    ];   
    public function type_stages()
    {
        return $this->belongsTo('App\TypeStage','type_stage_id');
    }
}
