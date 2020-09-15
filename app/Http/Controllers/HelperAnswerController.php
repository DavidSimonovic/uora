<?php

namespace App\Http\Controllers;

use App\HelperAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelperAnswerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id){

        $answer = new HelperAnswers();

        $answer->question_id = $id;
        $answer->author_id = Auth::user()->id;
        $answer->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $answer->answer = $request['createAnswer'];

        $answer->save();

        return redirect()->back()->with('success','Answer submited');

    }

    public function destroy($id, $ansid){

        $answer = HelperAnswers::where('id', $ansid);

        $answer->delete();

        return redirect()->back()->with('success','Answer Deleted.');
    }
}
