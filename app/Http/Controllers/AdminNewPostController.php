<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class AdminNewPostController extends Controller
{
    public function index(){

        $newposts = Post::where('state','new')->get();

        return view('admin.newpost',['newposts'=>$newposts]);
    }
    public function update($id){

        Post::where('id',$id)->update(['state'=>'aproved']);

        return redirect('admin/new/posts');
    }
}
