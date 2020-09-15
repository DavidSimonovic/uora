<?php

namespace App\Http\Controllers;
use App\News;

use Illuminate\Http\Request;

class AdminNewNewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $newNews = News::where('state','new')->get();

        return view('admin.newnews',['newNews' => $newNews]);
    }


    public function update($id){

        News::where('id',$id)->update(['state'=>'aproved']);

        return redirect()->back()->with('success','You aproved the news');

    }
}
