<?php

namespace App\Http\Controllers;
use App\Course;
use App\Topic;
use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function addNote(Request $request,$courseid,$topicid,Note $note){
    	$this->validate($request,[
    		'subheading' => 'required|min:3',
    		'note' => 'required|min:5'
    	]);

    	$note->course_id = $courseid;
    	$note->topic_id = $topicid;
    	$note->subheading = $request->input('subheading');
    	$note->note = $request->input('note');
    	
    	$note->save();

    	return redirect()->back()->with('info','note added');
    }

}
