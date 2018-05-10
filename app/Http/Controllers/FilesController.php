<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\File as File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    //
    public function uploadAttachments(Request $request,$id){
    	$this->validate($request,[
    		'file_name' => 'required|mimes:jpg,bmp,pdf|between:1,10000',
    		'notes' => 'required|min:5'
    	]);

    	$file = new File;
    	$file->casefile_id = $id;
    	$file->file_name = $request->file('file_name')->getClientOriginalName();

    	$fileUrl = time(). '.' .$request->file('file_name')->getClientOriginalExtension();
        $file->file_url = $fileUrl;
        $file->notes = $request->input('notes');
    	$request->file('file_name')->move(base_path().'/public/uploads/attachments/',$fileUrl);

    	$file->save();

    	return redirect()->back()->with('info','Attachment uploaded successfully');
    }
}
