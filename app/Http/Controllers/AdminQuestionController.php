<?php

namespace App\Http\Controllers;
use App\Question;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{
    public function index(){

        $questions = Question::all();

        return view('admin.question',['questions'=>$questions]);
    }
}
