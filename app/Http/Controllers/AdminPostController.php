<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(){

        $posts = Post::all();

        return view('admin.post',['posts'=>$posts]);
    }
}
