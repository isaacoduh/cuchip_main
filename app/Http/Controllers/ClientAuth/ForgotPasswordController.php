<?php

namespace App\Http\Controllers\ClientAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Trait
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

//Password Broker Facade
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    //sends password reset emails
    use SendsPasswordResetEmails;

    //shows form to request password reset
    public function showLinkRequestForm(){
        return view('client.passwords.email');
    }

    //password broker for client model
    public function broker(){
        return Password::broker('clients');
    }
}
