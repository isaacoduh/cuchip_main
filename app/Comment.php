<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['casefile_id','user_id','comments'];

    public function scopeCasefile($query,$id){
        return $query->where('casefile_id',$id);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //The scope will return all the comments that belong to one casefile
}
