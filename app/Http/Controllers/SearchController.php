<?php

namespace App\Http\Controllers;
use App\Post;
use App\Question;
use App\News;


use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){

        $searchItem = $request['search'];



        $posts = Post::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->get();

        $checkPosts = Post::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->exists();





        $questions = Question::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->get();
        $checkQuestions = Question::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->exists();



        $news = News::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->get();
        $checkNews = News::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->exists();


        if($checkPosts == null && $checkQuestions == null && $checkNews == null ){

        $noPost = "Nothing found";


        return view('searchresult',['noPost'=> $noPost,'searchItem'=>$searchItem]);
        }
        else
        {

            return view('searchresult',['posts'=>$posts,'news'=>$news,'questions'=>$questions]);

        }

    }
}
