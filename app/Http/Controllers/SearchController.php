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






        $questions = Question::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->get();




        $news = News::where('title', 'LIKE','%'.$searchItem.'%')->orwhere('author_name', 'LIKE','%'.$searchItem.'%')->get();





        return view('searchresult',['posts'=>$posts,'news'=>$news,'questions'=>$questions]);


    }
}
