<?php

namespace App\Http\Controllers;
use App\HelperQuestion;
use Illuminate\Http\Request;

class AdminHelperQuestionController extends Controller
{
    public function index(){

    $allHelperQuestions = HelperQuestion::all();

    return view('admin.helper',compact('allHelperQuestions'));

}
public function destroy($id){

    HelperQuestion::where('id',$id)->delete();

    return redirect()->back()->with('delete', 'Question Deleted');

}

}
