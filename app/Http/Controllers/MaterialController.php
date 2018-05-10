<?php

namespace App\Http\Controllers;
use App\Course;
use App\Topic;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    //
    public function addMaterial(Request $request,$courseid,$topicid,Material $material){
    	$this->validate($request,[
    		'type' => 'required|min:3',
    		'description' => 'required|min:5',
    		'material' => 'required|min:5',
    	]);

    	$material->course_id = $courseid;
    	$material->topic_id = $topicid;
    	$material->type = $request->input('type');
    	$material->description = $request->input('description');
    	$material->material = $request->input('material');

    	$material->save();

    	return redirect()->back()->with('info','material added');
    }

}
