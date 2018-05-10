<?php

namespace App\Http\Controllers;
use App\VaccinationDetail;
use App\Birthcase;
use Illuminate\Http\Request;

class VaccinationDetailController extends Controller
{
    //
    public function addVaccination(Request $request, $id,VaccinationDetail $vaccinationdetail){
    	$this->validate($request,[
    		'vaccine' => 'required',
    		'round' => 'required',
    		'months' => 'required',
    		'status' => 'required',
    	]);

    	$vaccinationdetail->birthcase_id = $id;
    	// get the birthday of this birthcase
    	$birthday = Birthcase::findOrFail($id)->date_of_birth;
    	$vaccinationdetail->vaccine_id = $request->input('vaccine');
    	$vaccinationdetail->round = $request->input('round');
    	$vaccinationdetail->months = $request->input('months');
    	$birthdate = $request->input('date_of_birth');
    	// $vaccinationdetail->due_date = date('Y-m-d',strtotime("$vaccinationdetail->months",strtotime($birthdate)));
    	// $vaccinationdetail->due_date = date_add($birthdate,date_interval_create_from_date_string("$vaccinationdetail->months months"));
    	$due_date = strtotime ( "$vaccinationdetail->months month" , strtotime ( $birthday ) ) ;
    	
    	$vaccinationdetail->due_date = date('Y-m-j',$due_date);
    	// $vaccinationdetail->due_date = $birthday;
    	$vaccinationdetail->status = $request->input('status');

    	$vaccinationdetail->save();

    	return redirect()->back()->with('info','vaccination added successfully');
    }
}
