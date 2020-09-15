<?php

namespace App\Http\Controllers;

use App\Category;
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
        $news = News::where('state','aproved')->get();
        $posts = Post::where('state','aproved')->get();
        $categories = Category::all();
        $questions = Question::where('state','aproved')->get();



        return view('home', ['posts' => $posts, 'questions' => $questions ,'news' => $news, 'categories'=>$categories]);
    }


}
