<?php

namespace App\Http\Controllers;
use App\Helper;

use Illuminate\Http\Request;

class AdminNewHelperQuestionController extends Controller
{
    public function index(){

        $allNewHelperQuestions = Helper::where('state','new')->get();


        return view('admin.newhelper',compact('allNewHelperQuestions'));

    }
}
