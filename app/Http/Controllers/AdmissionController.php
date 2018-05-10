<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    //
    public function setupAdmission(Request $request, $id, Admission $admission){
        $this->validate($request,[
            'name' => 'required|min:3',
            'admitted' => 'required',
            'status' => 'required',
        ]);

        $admission->casefile_id = $id;
        $admission->patient_name = $request->input('name');
        $admission->admitted = $request->input('admitted');
        $admission->status = $request->input('status');

        $admission->save();

        return redirect()->back()->with('info','Admission setup Successfully');
    }

    public function dischargePatient($casefileId,$admissionId){
        DB::table('admissions')->where('casefile_id',$casefileId)->where('id',$admissionId)->update(['status' => 'discharged']);
        return redirect()->back()->with('info','Admission updated.....');
    }
}
