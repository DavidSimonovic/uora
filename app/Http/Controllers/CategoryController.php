<?php

namespace App\Http\Controllers;
use App\News;
use App\Question;
use App\Post;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $id = $_GET['id'];

        $news = News::where('category_id',$id)->get();
        $posts = Post::where('category_id',$id)->get();
        $categories = Category::all();
        $questions = Question::where('category_id',$id)->get();

        return view('category', ['posts' => $posts, 'questions' => $questions ,'news' => $news, 'categories'=>$categories]);
    }

}
