<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthCase extends Model
{
    //
    protected $fillable = [];

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
