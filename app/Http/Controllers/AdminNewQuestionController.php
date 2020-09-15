<?php

namespace App\Http\Controllers;
use App\Question;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class AdminNewQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $newquestions = Question::where('state','new')->get();

        return view('admin.newquestion',['newquestions' => $newquestions]);
    }

    public function update($id){

        Question::where('id',$id)->update(['state'=>'aproved']);

        return redirect('admin/new/questions');
    }
}
