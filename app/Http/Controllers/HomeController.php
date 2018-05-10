<?php

namespace App\Http\Controllers;

use Auth;
use App\Casefile as Casefile;
use App\Client as Client;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // $client = Auth::user()->client_id->get();
        $client = Client::find(Auth::user());
        $casefiles = Client::find(Auth::user()->client_id)->casefiles;
        $params = [
            'user' => $user,
            'casefiles' => $casefiles,
            'client' => $client,
        ];
        return view('home')->with($params);
    }

    public function getCasefiles($client){
        // Casefiles that the user has access to.
        $casefiles = Casefile::find($client)->get();
        return $casefiles;
    }
}
