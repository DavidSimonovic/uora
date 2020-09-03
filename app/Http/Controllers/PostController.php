<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $posts = Post::all();

        return view('post',['posts'=>$posts]);
    }

    public function show($id){

        $posts = Post::where('id',$id)->get();

        return view('fullpage',['posts'=>$posts]);
    }
}
