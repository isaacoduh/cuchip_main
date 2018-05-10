<?php

namespace App\Http\Controllers;


use App\User;
use App\Client;
use App\Casefile;
use App\BirthCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;


class ClientController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:client');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Auth::guard('client')->user()->id;
        $users = Client::find($client)->users;
        $casefiles = Client::find($client)->casefiles;
        $birthcases = Client::find($client)->birthcases;
        // $birthcases = $this->getBirthcases($client);
        $today = date('d/m/Y');
        $clients = Client::paginate(10);
        
        return view('client.dashboard', array('client' => Auth::guard('client')->user(), 'users' => $users,'casefiles' => $casefiles, 'birthcases' => $birthcases, 'today' => $today));

    }

    public function details(){
        $client = Auth::guard('client')->user()->id;
        $users = Client::find($client)->users;
        $today = date('d/m/Y');
        $clients = Client::paginate(10);
        return view('client.profile', array('client' => Auth::guard('client')->user(), 'users' => $users, 'today' => $today));
    }

    public function createUserForm(){
        //this makes the client field hidden so as to allow to be passed as a hidden field when storing the user in the database
        return view('client.user.create', array('client' => Auth::guard('client')->user()));
    }


    public function storeUser(Request $request){
        $this->validate($request, [
            'client_id' => 'required|min:1',
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required',
            'bio' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User;
        $user->client_id = Auth::guard('client')->user()->id;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->bio = $request->input('bio');
        $user->password = bcrypt($request->input('password'));
        
        $user->save();
        return redirect()->route('/clientprofile')->with('info', 'User added successfully');
    }

    public function getUsers($id){
        $user = new User;
        $users = User::client($id)->get();
        return $users;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCasefiles($id){
        $casefiles = Casefile::client_id($id)->get();
    }

    public function getBirthcases($id){
        $birthcases = BirthCase::client_id($id)->get();
    }

    
}
