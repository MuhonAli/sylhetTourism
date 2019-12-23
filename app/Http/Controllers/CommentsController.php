<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;

use Redirect;
use Auth;

class CommentsController extends Controller
{

    public function getComment($id)
    {
        $data = Comment::find($id);
        return response()->json(['data' => $data]);
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Session::flash('comments', 'Review removed successfully.');
        return Redirect::back();
    }
    public function editComment(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $this->validate($request,[
        	'editedComment'=>'required',
            'rate'=>'required'
           ]);
        $comment->comment = $request->input('editedComment');
        $comment->rate = $request->input('rate');
        $comment->save();
               Session::flash('comments', 'Review updated successfully.');
        return Redirect::back();
        
    }
}
