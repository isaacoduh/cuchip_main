<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
	protected $fillable = ['note'];

    public function scopeCourse($query,$id){
    	return $query->where('course_id',$id);
    }

    public function scopeTopic($query,$id){
    	return $query->where('topic_id',$id);
    }
}
