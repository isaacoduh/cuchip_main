<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    //
    public function index(){
    	$today = date('M d,Y');
    	$courses = $this->getCourses();
        $params = [
            'today' => $today,
            'courses' => $courses,
        ];
    	return view('guides.index')->with($params);
    }

    public function consolehome(){
    	$today = date('M d, Y');
    	$courses = $this->getCourses();
    	$params = [
    		'today' => $today,
    		'courses' => $courses,
    	];
    	return view('guides.console.index')->with($params);
    }

    public function getCourses(){
    	$courses = Course::all();
    	return $courses;
    }
}
