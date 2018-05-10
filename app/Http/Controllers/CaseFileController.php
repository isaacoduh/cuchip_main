<?php

namespace App\Http\Controllers;
use App\Casefile;
use App\Client;
use App\Prescription;
use App\File;
use App\Appointment;
use App\Admission;
use App\Comment;
use Auth;
use App\User;
use Illuminate\Http\Request;

class CaseFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $client = Auth::guard('client')->user()->id;
        $casefiles = Casefile::all();
        $today = date('d/m/Y');
        $params = [
            'client' => Auth::guard('client')->user(),
            'today' => $today,
            'casefiles' => $casefiles,
        ];
        return view('client.casefiles.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $today = date('d/m/Y');
        $randomHash = $this->generaterandomnumbers();
        $params = [
            'client' => Auth::guard('client')->user(),
            'randomHash' => $randomHash,
            'today' => $today,
        ];

        return view('client.casefiles.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'client_id' => 'required',
            // 'user_id' => 'required',
            'casefile_id' => 'required|unique:casefiles',
            'registration_date' => 'required',
            'patient_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'contact' => 'required',
            'date_of_birth' => 'required',
            'sex' => 'required',
            'marital_status' => 'required',
            'bloodgroup' => 'required',
            'genotype' => 'required',
            'employer' => '',
            'employer_address' => '',
            'employer_contact' => '',
            'emergency_contact' => 'required',
            'emergency_phone' => 'required',
        ]);

        /*The user while logged in also should have the client id attached to its */
        $casefile = new Casefile();
        $casefile->client_id = Auth::guard('client')->user()->id;
        $casefile->casefile_id = $request->input('casefile_id');
        $casefile->registration_date = $request->input('registration_date');
        $casefile->patient_name = $request->input('patient_name');
        $casefile->address = $request->input('address');
        $casefile->city = $request->input('city');
        $casefile->state = $request->input('state');
        $casefile->contact = $request->input('contact');
        $casefile->date_of_birth = $request->input('date_of_birth');
        $casefile->sex = $request->input('sex');
        $casefile->marital_status = $request->input('marital_status');
        $casefile->bloodgroup = $request->input('bloodgroup');
        $casefile->genotype = $request->input('genotype');
        $casefile->employer = $request->input('employer');
        $casefile->employer_address = $request->input('employer_address');
        $casefile->employer_contact = $request->input('employer_contact');
        $casefile->emergency_contact = $request->input('emergency_contact');
        $casefile->emergency_phone = $request->input('emergency_phone');

        $casefile->save();


        return redirect()->route('client.casefiles.index')->with('success',"The casefile <strong>$casefile->casefile_id</strong> has been created successfully.");
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
        $casefile = Casefile::findOrFail($id);
        $today = date('d/m/Y');
        $user = Auth::guard()->user();
        $params = [
            'today' => $today,
            'casefile' => $casefile,
        ];

        return view('client.casefiles.show')->with($params);
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
        $casefile = Casefile::findOrFail($id);
        $params = [
            'casefile' => $casefile,
        ];

        return view('client.casefiles.edit')->with($params);
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
        $casefile = Casefile::findOrFail($id);

        $this->validate($request,[
            // 'client_id' => 'required',
            // 'user_id' => 'required',
            // 'casefile_id' => 'required|unique:casefiles',
            // 'registration_date' => 'required',
            'patient_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'contact' => 'required',
            'date_of_birth' => 'required',
            'sex' => 'required',
            'marital_status' => 'required',
            'bloodgroup' => 'required',
            'genotype' => 'required',
            'employer' => '',
            'employer_address' => '',
            'employer_contact' => '',
            'emergency_contact' => 'required',
            'emergency_phone' => 'required',
        ]);

        $casefile->patient_name = $request->input('patient_name');
        $casefile->address = $request->input('address');
        $casefile->city = $request->input('city');
        $casefile->state = $request->input('state');
        $casefile->contact = $request->input('contact');
        $casefile->date_of_birth = $request->input('date_of_birth');
        $casefile->sex = $request->input('sex');
        $casefile->marital_status = $request->input('marital_status');
        $casefile->bloodgroup = $request->input('bloodgroup');
        $casfile->genotype = $request->input('genotype');
        $casefile->employer = $request->input('employer');
        $casefile->employer_address = $request->input('employer_address');
        $casefile->employer_contact = $request->input('employer_contact');
        $casefile->emergency_contact = $request->input('emergency_contact');
        $casefile->emergency_phone = $request->input('emergency_phone');

        $casefile->save();

        return redirect()->route('client.casefiles.index')->with('success',"The casefile with <strong>$casefile->id</strong> has been successfully updated");

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
        $casefile = Casefile::findOrFail($id);

        $casefile->delete();
        return redirect()->route('client.casefiles.index')->with('success',"The casefile with <strong>$casefile->casefile_id</strong> has been successfully archived");
    }

    public function generaterandomnumbers($length = 8){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $numbersLength = strlen($numbers);
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i=0; $i < $length; $i++){
            $randomString .= $numbers[rand(0,$numbersLength - 1)];
        }
        return $randomString;
    }

    public function showAllCasefiles($id){

        //show all case files for this particular client
        //get the client that the user belongs to
        $user = Auth::guard()->user();
        // $client = User::find($id)->client;
        $client = Client::find($id);
        //$client = Client::find($id)->client_id;
        // return $client->id;
        //display all the casefiles that a particular client is privy to
        $casefiles = Client::findOrFail($client->id)->casefiles;
        $today = date('d/m/Y');
        $params = [
            'user' => $user,
            'client' => $client,
            'today' => $today,
            'casefiles' => $casefiles,
        ];

        return view('casefiles.index')->with($params);
    }

    public function showCasefile($id){
        $user = Auth::guard()->user();
        $casefile = Casefile::findOrFail($id);
        // $prescriptions = Prescription::find($casefile->id)->get();
        $prescriptions = $this->getPrescriptions($id);
        $files = $this->getFiles($id);
        $appointments = $this->getAppointments($id);
        $admissions = $this->getAdmissions($id);
        $comments = $this->getComments($id);
        // $files = File::findOrFail($casefile->id)->get();
        $today = date('d/M/Y');
        $params = [
            'today' => $today,
            'casefile' => $casefile,
            'user' => $user,
            'prescriptions' => $prescriptions,
            'files' => $files,
            'appointments' => $appointments,
            'admissions' => $admissions,
            'comments' => $comments,
        ];

        return view('casefiles.show')->with($params);
    }

    public function getPrescriptions($id){
        $prescriptions = Prescription::casefile($id)->get();
        return $prescriptions;
    }

    public function getFiles($id){
        $files = File::casefile($id)->get();
        return $files;
    }

    public function getAppointments($id){
        $appointments = Appointment::casefile($id)->get();
        return $appointments;
    }

    public function getAdmissions($id){
        $admissions = Admission::casefile($id)->get();
        return $admissions;
    }

    public function getComments($id){
        $comments = Comment::casefile($id)->get();
        return $comments;
    }

}
