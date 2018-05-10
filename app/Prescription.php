<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    protected $fillable = ['casefile_id','name','dosage','notes'];

    // public function casefile(){
    // 	return $this->belongsTo('App\Casefile');
    // }

    public function scopeCasefile($query,$id){
    	return $query->where('casefile_id',$id);
    }
}
