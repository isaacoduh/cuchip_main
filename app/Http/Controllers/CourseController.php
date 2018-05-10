<?php

namespace App\Http\Controllers;
use App\Course;
use App\Topic;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function create(){
    	$today = date('M d, Y');
    	$params = [
    		'today' => $today,
    	];
    	return view('guides.console.courses.create')->with($params);
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'coursename' => 'required|min:6',
    		'description' => 'required',
    		'authors' => ''
        ]);

        /*The user while logged in also should have the client id attached to its */
        $course = new Course();
        $course->coursename = $request->input('coursename');
        $course->description = $request->input('description');
        $course->authors = $request->input('authors');
        $course->save();


        return redirect()->route('guide.console.index')->with('success',"The course <strong>$course->coursename</strong> has been created successfully.");
    }

    public function show($id){
    	$course = Course::findOrFail($id);
    	$topics = $this->getTopics($id);
    	$today = date('M d, Y');
    	$params = [
    		'today' => $today,
    		'course' => $course,
    		'topics' => $topics,
    	];
    	return view('guides.console.courses.show')->with($params);
    }

    public function showCourse($id){
        $course = Course::findOrFail($id);
        $topics = $this->getTopics($id);
        $today = date('M d, Y');
        $params = [
            'today' => $today,
            'course' => $course,
            'topics' => $topics,
        ];
        return view('guides.courses.show')->with($params);  
    }

    public function getTopics($id){
    	$topics = Topic::course($id)->get();
        return $topics;
    }
}
