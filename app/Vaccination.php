<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    //
    protected $fillable = ['client_id','infant_id'];

    public function scopeBirthCase($query,$id){
    	return $query->where('birthcase_id',$id);
    }
}
