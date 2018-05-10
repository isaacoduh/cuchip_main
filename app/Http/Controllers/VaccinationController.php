<?php

namespace App\Http\Controllers;
use App\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    //

    public function clientstore(Request $request){
    	$vaccination = new Vaccination();
    	$vaccination->client_id = $request->input('client_id');
    	$vaccination->infant_id = $request->input('infant_id');
 		
 		$vaccination->save();
 		return redirect()->back()->with('info','vaccination setup successful');
 		
    }
}
