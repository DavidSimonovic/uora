<?php

namespace App\Http\Controllers;
use App\PostComment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function index(){

    }
    public function store(Request $request, $id){

        $comment = new PostComment();

        $comment->post_id = $id;
        $comment->author_id = Auth::user()->id;
        $comment->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $comment->comment = $request['createComment'];

        $comment->save();

        return redirect('/fullpost/'.$id);

    }
    public function destroy($id, $postcomid){

        $comment = PostComment::where('id', $postcomid);

        $comment->delete();

        return redirect('/fullpost/'.$id);
    }
}
