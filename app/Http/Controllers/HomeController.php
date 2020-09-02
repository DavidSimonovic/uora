<?php

namespace App\Http\Controllers;

use App\Post;
use App\Question;
use App\News;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::all();
        $posts = Post::all();

        $questions = Question::all();



        return view('home', ['posts' => $posts, 'questions' => $questions ,'news' => $news]);
    }
     public function show(){

        // Category post

    }


}
