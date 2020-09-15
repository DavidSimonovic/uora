<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $posts = Post::all();

        return view('admin.post',['posts'=>$posts]);
    }

    public function update($id){

        Post::where('id',$id)->update(['state' => 'new']);

        return redirect()->back()->with('success','Post is unaproved');
    }
}
