<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    $news = News::all();

    return view('admin.news',['news'=>$news]);
}



}
