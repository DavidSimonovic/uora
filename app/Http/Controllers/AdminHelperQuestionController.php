<?php

namespace App\Http\Controllers;
use App\Helper;
use App\HelperAnswers;
use Illuminate\Http\Request;

class AdminHelperQuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    $allHelperQuestions = Helper::all();


    return view('admin.helper',compact('allHelperQuestions'));

}
public function show($id){

    $allHelperQuestions = Helper::where('id',$id)->get();

    $helperAnswer = HelperAnswers::where('question_id',$id)->get();

    return view('admin.fullhelper',['allHelperQuestions' => $allHelperQuestions, 'helperAnswer'=>$helperAnswer]);

}
public function destroy($id){

    Helper::where('id',$id)->delete();

    HelperAnswers::where('question_id',$id)->delete();

    return redirect()->back()->with('delete', 'Question Deleted');

}
public function update($id){

    Helper::where('id',$id)->update(['state'=> 'answered']);
    return redirect()->back()->with('success','Question Answered');
}

}
