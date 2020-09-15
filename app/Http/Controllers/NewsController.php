<?php

namespace App\Http\Controllers;
use App\News;
use App\NewsComment;
use App\NewsView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $news = News::all();
        return view('news',['news'=>$news]);

    }

    public function show($id){

        $news = News::where('id',$id)->get();

        $comments = NewsComment::where('news_id',$id)->get();


        // Here change to counting from the base so the views are not spam

        $userName = Auth::user()->name;

        // Checks if the user exist in the view table withe the postId, if not found the $newsview will be null

        $newsview = NewsView::where([['news_id', '=' , $id],["user", '=' , $userName]])->exists();


        // Check if the user viwed this post, if not he adds the user to the view table


        // if $newsview is null the user will be added to the table

        if($newsview == null){

        // the user will be added to the base and shown the post with updaed count

            // Creating new View


            $view = new NewsView();

            // the id of this post

            $view->news_id = $id;

            // the username that is loged in at the moment of clicking on the post

            $view->user = $userName;

            // saving the view to the table

            $view->save();



            $news_views = newsview::all()->where('news_id', $id);

            // updates the count every time someone clicks on the post by counting the number in the view table with the postId

                News::where('id',$id)->update(['view_count' => DB::raw(count($news_views)) ]);


                return view('fullnews',['news'=>$news, 'comments'=>$comments]);
            }

            return view('fullnews',['news'=>$news, 'comments'=>$comments]);
    }

    public function destroy($id){

        $news = News::where('id', $id);

        $news->delete();

        return redirect()->back()->with('success','News Deleted');

    }
    public function edit($id){

    }

}
