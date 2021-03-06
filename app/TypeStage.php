<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeStage extends Model
{
	//
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_stages';
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'component_id', 'name','amount_total','amount_spent'
    ];   
    public function components()
    {
        return $this->belongsTo('App\Component','component_id');
    }

}
