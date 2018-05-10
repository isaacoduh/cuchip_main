<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = ['casefile_id','name','description','preferred_date'];

    public function scopeCasefile($query,$id){
    	return $query->where('casefile_id',$id);

    	//query scope to access all appointments that belong to one casefile.
    }

    
}
