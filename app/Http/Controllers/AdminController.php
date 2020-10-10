<?php

namespace App\Http\Controllers;

use App\Helper;
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


        $newPosts = Post::where('state','new')->count();
        $newQuestions = Question::where('state','new')->count();

        $newUser = User::where('state','new')->count();
        $newNews = News::where('state','new')->count();

        $allPosts = Post::all()->count();
        $allQuestions = Question::all()->count();

        $allUser = User::all()->count();
        $allNews = News::all()->count();

        $allReports = Report::all()->count();

        $allHelperQuestions = Helper::all()->count();
        $allNewHelperQuestions = Helper::where('state','new')->count();

        return view('admin.home',[
            'newPosts' => $newPosts,
            'newQuestions' => $newQuestions,
            'newUsers' => $newUser,
            'newNews' => $newNews,
            'allPosts' => $allPosts,
            'allQuestions' => $allQuestions,
            'allUsers' => $allUser,
            'allNews' => $allNews,
            'allReports' => $allReports,
            'allHelperQuestions'=>$allHelperQuestions,
            'allNewHelperQuestions' => $allNewHelperQuestions ]);

    }
    else{

        return redirect()->back()->with('success','You are not allowed to access this site!');

    }

}
}
