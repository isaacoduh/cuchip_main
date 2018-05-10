<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    //
    public function vaccinationdetail(){
    	return $this->belongsTo('App\VaccinationDetail','vaccine_id');
    }
}
