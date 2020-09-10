<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Question;
use App\News;
use App\Report;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

    if(Auth::user()->user_role == 'helper'){


        $newPosts = count(Post::where('state','new')->get());
        $newQuestions = count(Question::where('state','new')->get());

        $newUser = count(User::where('state','new')->get());
        $newNews = count(News::where('state','new')->get());

        $allPosts = count(Post::all());
        $allQuestions = count(Question::all());

        $allUser = count(User::all());
        $allNews = count(News::all());
        $allReports = count(Report::all());

        return view('admin.home',[ 'newPosts' => $newPosts,'newQuestions' => $newQuestions, 'newUsers' => $newUser, 'newNews' => $newNews, 'allPosts' => $allPosts,'allQuestions' => $allQuestions, 'allUsers' => $allUser, 'allNews' => $allNews,'allReports' => $allReports ]);

    }
    else{

        return redirect('/home');

    }

}
}
