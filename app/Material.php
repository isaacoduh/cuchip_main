<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['type','description','material'];

    public function scopeCourse($query,$id){
    	return $query->where('course_id',$id);
    }

    public function scopeTopic($query,$id){
    	return $query->where('topic_id',$id);
    }
}
