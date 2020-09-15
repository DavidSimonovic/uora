<?php

namespace App\Http\Controllers;
use App\NewsComment;
use App\News;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class NewsCommentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id){

        $comment = new NewsComment();

        $comment->news_id = $id;
        $comment->author_id = Auth::user()->id;
        $comment->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $comment->comment = $request['createcomment'];

        $comment->save();

        return redirect('/fullnews/'.$id);

    }
    public function destroy($id, $newscomid){

        $comment = NewsComment::where('id', $newscomid);

        $comment->delete();

        return redirect('/fullnews/'.$id);
    }
}
