<?php

namespace App\Http\Controllers;
use App\Birthcase;
use App\Vaccination;
use App\Vaccine;
use App\VaccinationDetail;
use Auth;
use Illuminate\Http\Request;

class BirthCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    //===========================Client=================//
    public function clienthome(){
        $birthcases = BirthCase::all();
        $today = date('d/m/Y');

        $params = [
            'client' => Auth::guard('client')->user(),
            'today' => $today,
            'birthcases' => $birthcases,
        ];
        return view('client.birthcases.index')->with($params);
        // return $params;
    }

    public function clientcreate(){
        $today = date('d/m/Y');
        $randomHash = $this->generaterandomnumbers();
        $params = [
            'client' => Auth::guard('client')->user(),
            'randomHash' => $randomHash,
            'today' => $today,
        ];

        return view('client.birthcases.create')->with($params);
    }

    public function clientshow($id){
        $user = Auth::guard()->user();
        $birthcase = BirthCase::findOrFail($id);
        $vaccination = $this->getVaccination($birthcase->id);
        $vaccines = Vaccine::all();
        $vaccinationdetails = $this->getVaccinationDetails($birthcase->id);
        // $prescriptions = Prescription::find($casefile->id)->get();
        // $files = File::findOrFail($casefile->id)->get();
        $today = date('d/M/Y');
        $params = [
            'client' => Auth::guard('client')->user(),
            'today' => $today,
            'birthcase' => $birthcase,
            'user' => $user,
            'vaccination' => $vaccination,
            'vaccines' => $vaccines,
            'vaccinationdetails' => $vaccinationdetails,
        ];

        return view('client.birthcases.show')->with($params);
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

    public function clientstore(Request $request){
        $this->validate($request,[
            'infant_details' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'parents_info' => 'required',
            'parents_address' =>'required',
            
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
        ]);

        $birthcase = new BirthCase();
        $birthcase->client_id = Auth::guard('client')->user()->id;
        $birthcase->infant_details = $request->input('infant_details');
        $birthcase->gender = $request->input('gender');
        $birthcase->date_of_birth = $request->input('date_of_birth');
        $birthcase->parents_info = $request->input('parents_info');
        $birthcase->parents_address = $request->input('parents_address');
        $birthcase->city = $request->input('city');
        $birthcase->state = $request->input('state');
        $birthcase->phone = $request->input('phone');

        $birthcase->save();

        return redirect()->route('client.birthcase.index')->with('success',"The birthcase for <strong>$birthcase->infant_details</strong> has been created successfully.");

       // return $birthcase;
    }

    public function vaccinationreport($id){
        $user = Auth::guard()->user();
        $birthcase = BirthCase::findOrFail($id);
        $vaccination = $this->getVaccination($birthcase->id);
        $vaccines = Vaccine::all();
        $vaccinationdetails = $this->getVaccinationDetails($birthcase->id);
        // $prescriptions = Prescription::find($casefile->id)->get();
        // $files = File::findOrFail($casefile->id)->get();
        $today = date('d/M/Y');
        $params = [
            'client' => Auth::guard('client')->user(),
            'today' => $today,
            'birthcase' => $birthcase,
            'user' => $user,
            'vaccination' => $vaccination,
            'vaccines' => $vaccines,
            'vaccinationdetails' => $vaccinationdetails,
        ];

        return view('client.birthcases.report')->with($params);
    }

    public function getVaccination($id){
        $vaccination = Vaccination::birthcase($id)->get();
        return $vaccination;
    }

    public function getVaccinationDetails($id){
        $vaccinationdetails = VaccinationDetail::birthcase($id)->get();
        return $vaccinationdetails;
    }

    
}
