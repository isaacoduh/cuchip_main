<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    // protected $fillable = ['casefile_id','name','admitted','status'];
    protected $fillable = ['notes'];

    // public function casefile(){
    // 	return $this->belongsTo('App\Casefile');
    // }

    public function scopeCasefile($query,$id){
        return $query->where('casefile_id',$id);
    }
}
