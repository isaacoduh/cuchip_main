<?php

namespace App\Http\Controllers\ClientAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validator facade used in the validator method
use Illuminate\Support\Facades\Validator;

use App\Client;
use Auth;


class RegisterController extends Controller
{
    //

    //redirect path
    protected $redirectPath = 'clientdashboard';

    
    public function showRegistrationForm(){
        return view('client.auth.register');
    }

    // handles registration request for clients
    public function register(Request $request){
        //validates the data
        $this->validator($request->all())->validate();

        //create a client
        $client = $this->create($request->all());

        //authenticates client
        $this->guard()->login($client);

        //redirect clients
        return redirect($this->redirectPath);

    }

    //validates user input

    protected function validator(array $data){
        return Validator::make($data,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'address' => 'required',
            'contact' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    //create a new client instance after validation
    protected function create(array $data){
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //get the guard to authenticate the client
    protected function guard(){
        return Auth::guard('client');
    }
}
