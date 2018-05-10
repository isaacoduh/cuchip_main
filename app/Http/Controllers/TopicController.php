<?php

namespace App\Http\Controllers;
use App\Course;
use App\Topic;
use App\Note;
use App\Material;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //
    public function create($id){
    	$today = date('M d,Y');
    	$course = $this->getCourse($id);
    	$params = [
    		'today' => $today,
    		'course' => $course,
    	];
    	return view('guides.console.topics.create')->with($params);
    	// return $course->id;
    }

    public function store(Request $request,$id,Topic $topic){
    	$this->validate($request,[
    		'name' => 'required|min:3',
    		'description' => 'required|min:5'
    	]);

    	$topic->course_id = $id;
    	$topic->name = $request->input('name');
    	$topic->description = $request->input('description');
    	$topic->save();

    	return redirect()->back()->with('info','topic added');
    }

    public function show($courseid,$topicid){
    	$today = date('M d, Y');
    	$topic = Topic::where('course_id',$courseid)->where('id',$topicid)->first();
    	$course = $this->getCourse($topic->course_id);
    	$notes = $this->getNotes($topic->id);
    	$materials = $this->getMaterials($topic->id);
    	$params = [
    		'today' => $today,
    		'topic' => $topic,
    		'course' => $course,
    		'notes' => $notes,
    		'materials' => $materials,
    	];
    	return view('guides.console.topics.show')->with($params);

    }

    public function showTopic($courseid,$topicid){
        $today = date('M d, Y');
        $topic = Topic::where('course_id',$courseid)->where('id',$topicid)->first();
        $course = $this->getCourse($topic->course_id);
        $notes = $this->getNotes($topic->id);
        $materials = $this->getMaterials($topic->id);
        $params = [
            'today' => $today,
            'topic' => $topic,
            'course' => $course,
            'notes' => $notes,
            'materials' => $materials,
        ];
        return view('guides.topics.show')->with($params);
    }

    public function getCourse($id){
    	$course = Course::findOrFail($id);
    	return $course;
    }

    public function getNotes($id){
    	// $prescriptions = Prescription::casefile($id)->get();
     //    return $prescriptions;
    	$notes = Note::topic($id)->get();
    	return $notes;
    }

    public function getMaterials($id){
    	$materials = Material::topic($id)->get();
    	return $materials;
    }
}
