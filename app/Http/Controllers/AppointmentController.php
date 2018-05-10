<?php

namespace App\Http\Controllers;
use DB;
use AUth;
use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //

    public function setupAppointment(Request $request, $id,Appointment $appointment){
    	$this->validate($request,[
    		'name' => 'required|min:3',
    		'description' => 'required|min:5',
    		'preferred_date' => 'required',
    	]);

    	$appointment->casefile_id = $id;
    	$appointment->patient_name = $request->input('name');
    	$appointment->description = $request->input('description');
    	$appointment->preferred_date = $request->input('preferred_date');
    	$appointment->save();

    	return redirect()->back()->with('info','Appointment setup Successfully');
    }

    public function checkAppointment($casefileId, $appointmentId){
        $appointment = Appointment::where('casefile_id',$casefileId)->where('id',$appointmentId)->first();
        return view('appointments.edit')->withAppointment($appointment)->with('casefileId',$casefileId);
    }

    public function updateAppointment(Request $request, $casefileId, $appointmentId){
        $this->validate($request,[
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'preferred_date' => 'required',
        ]);

        DB::table('appointments')->where('casefile_id',$casefileId)->where('id',$appointmentId)->update([
            'patient_name' => $request->input('name'),
            'description' => $request->input('description'), 'preferred_date' => $request->input('preferred_date') 
        ]);

        return redirect()->back()->with('info','Appointment updated.....');
    }

    public function deleteAppointment($casefileId,$appointmentId){
        DB::table('appointments')->where('casefile_id',$casefileId)->where('id',$appointmentId)->delete();
        
        return redirect()->route('casefiles.show')->with('info','Appointment Cancelled......');
    }
}
