<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//Notification for Client
use App\Notifications\ClientResetPasswordNotification;

class Client extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address','contact','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //send password reset notification 
    public function sendPasswordResetNotification($token){
        $this->notify(new ClientResetPasswordNotification($token));
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}

