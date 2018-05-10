<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $fillable = ['name','description'];

    public function scopeCourse($query,$id){
    	return $query->where('course_id',$id);
    }
}
