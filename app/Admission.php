<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{	
    //
    protected $fillable = ['casefile_id','name','admitted','status'];

    public function scopeCasefile($query,$id){
        return $query->where('casefile_id',$id);
    }
}
