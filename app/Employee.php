<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'names', 'last_name','last_name_mother','birth_date','rut','email','phone','address','commune','city','afp_id','health_id','profession','quality_studies','semesters','url_certificate','url_identification'
    ];
   public function afps()
    {
        return $this->belongsTo('App\Afp','afp_id');
    }
    public function healths()
    {
        return $this->belongsTo('App\Health','health_id');
    }

    
}
	