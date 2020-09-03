<?php

namespace App\Http\Controllers;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $questions = Question::all();

        return view( 'question' , ['questions' => $questions]);

    }
}
