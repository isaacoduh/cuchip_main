<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casefile extends Model
{
    //Casefile Model

    // Fillable to avoid mass assignment error
    protected $fillable = ['registration_date','patient_name','address','city','state','contact','date_of_birth','sex','marital_status','bloodgroup','genotype','employer','employer_address','employer_contact','emergency_contact','emergency_phone'];


    // public function client(){
    //     return $this->belongsTo('App\Client');
    // }

    // public function prescriptions(){
    // 	return $this->hasMany('App\Prescription');
    // }

    // public function files(){
    // 	return $this->hasMany('App\Files');
    // }
}
