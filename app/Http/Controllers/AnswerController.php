<?php

namespace App\Http\Controllers;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, $id){

        $answer = new Answer();

        $answer->question_id = $id;
        $answer->author_id = Auth::user()->id;
        $answer->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $answer->answer = $request['createAnswer'];

        $answer->save();

        return redirect('/fullquestion/'.$id);

    }
    public function destroy($id, $ansid){

        $answer = Answer::where('id', $ansid);

        $answer->delete();

        return redirect('/fullquestion/'.$id);
    }
}
