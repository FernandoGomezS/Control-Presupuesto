<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
	
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'names', 'last_name','last_name_mother','birth_date','rut','email','phone','address'
    ];   
    
}