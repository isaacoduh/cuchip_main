<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccinationDetail extends Model
{
    //
    protected $fillable = ['round','months','status'];

    public function scopeBirthCase($query,$id){
    	return $query->where('birthcase_id',$id);
    }

    public function vaccine(){
    	return $this->belongsTo('App\Vaccine','vaccine_id','id');
    }

}
