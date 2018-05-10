<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function postNewComment(Request $request, $id, Comment $comment)
    {
       $this->validate($request, [
            'comments'     => 'required|min:5',
        ]);
        $comment->casefile_id     = $id;
        $comment->user_id        = Auth::user()->id;
        $comment->comments = $request->input('comments');
        $comment->save();

        return redirect()->back()->with('info', 'Comment posted successfully');
    }

    public function getOneComment($casefileId,$commentId){
        $comment = Comment::where('casefile_id',$casefileId)->where('id',$commentId)->first();
        return view('comments.edit')->withComment($comment)->with('casefileId',$casefileId);
    }

    public function updateOneComment(Request $request, $casefileId,$commentId){
        $this->validate($request,[
            'comments' => 'required|min:3'
        ]);

        DB::table('comments')->where('casefile_id',$casefileId)->where('id',$commentId)->update(['comments' => $request->input('comments')]);

        return redirect()->back()->with('info','Your comment has been updated successfully');
    }

    public function deleteOneComment($casefileId,$commentId){
        DB::table('comments')->where('casefile_id',$casefileId)->where('id',$commentId)->delete();
        return redirect()->route('casefiles.show')->with('info','Comment deleted successfully');
    }
}
