<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'amount_total','numbers_employees' 
    ];
    
}
