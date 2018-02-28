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
        'year', 'amount_total','numbers_employees','state' 
    ];
    


    public static function getPossibleEnumValues($name){
    $instance = new static; // create an instance of the model to be able to get the table name
    $type = DB::select( DB::raw('SHOW COLUMNS FROM '.$instance->getTable().' WHERE Field = "'.$name.'"') )[0]->Type;
    preg_match('/^enum\((.*)\)$/', $type, $matches);
    $enum = array();
    foreach(explode(',', $matches[1]) as $value){
        $v = trim( $value, "'" );
        $enum[] = $v;
    }
    return $enum;
}
}
