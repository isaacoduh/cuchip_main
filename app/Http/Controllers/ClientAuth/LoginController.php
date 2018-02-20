<?php

namespace App\Http\Controllers\ClientAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Auth facade
use Auth;

class LoginController extends Controller
{
    //

    //Where to redirect seller after login.
    protected $redirectTo = '/clientdashboard';
    
    //trait;
    use AuthenticatesUsers;

    protected function guard(){
        return Auth::guard('client');
    }

    protected function showLoginForm(){
        return view('client.auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/clientlogin');
    }
}
