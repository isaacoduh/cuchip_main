<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    //
    public function postNewPrescription(Request $request, $id, Prescription $prescription){
        $this->validate($request,[
            'name' => 'required|min:3',
            'dosage' => 'required|min:5',
            'notes' => 'required|min:5',
        ]);

        $prescription->casefile_id = $id;
        $prescription->name = $request->input('name');
        $prescription->dosage = $request->input('dosage');
        $prescription->notes = $request->input('notes');
        $prescription->save();
        
        return redirect()->back()->with('info','Prescription added Successfully');
    } 

    public function getOnePrescription($casefileId, $prescriptionId){
        $prescription = Prescription::where('casefile_id',$casefileId)->where('id',$prescriptionId)->first();
        return view('prescriptions.edit')->withPrescription($prescription)->with('casefileId',$casefileId);
    }

    public function updateOnePrescription(Request $request, $casefileId, $prescriptionId){
        $this->validate($request,[
            'name' => 'required|min:3',
            'dosage' => 'required|min:5',
            'notes' => 'required|min:5',
        ]);

        DB::table('prescriptions')->where('casefile_id',$casefileId)->where('id',$prescriptionId)->update(['name' => $request->input('name'), 'dosage' => $request->input('dosage'), 'notes' => $request->input('notes') ]);

        return redirect()->back()->with('info','Prescription updated...');
        // return redirect()->route('casefiles.index')->with('success',"The product <strong>$product->product_name</strong> has been updated");
        // return redirect()->route('casefiles.showsingle')->with('info','Prescription updated....');

    }

    public function deletePrescription($casefileId,$prescriptionId){
        DB::table('prescriptions')->where('casefile_id',$casefileId)->where('id',$prescriptionId)->delete();
        
        return redirect()->route('casefiles.show')->with('info','Prescription Removed');
    }
}
