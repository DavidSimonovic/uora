<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{

    public function index(){
    $news = News::all();

    return view('admin.news',['news'=>$news]);
}



}
