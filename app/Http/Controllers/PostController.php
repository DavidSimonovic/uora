<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\PostView;
use App\PostComment;

use Illuminate\Support\Facades\DB;
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

        $comments = PostComment::where('post_id',$id)->get();


        // Here change to counting from the base so the views are not spam

        $userName = Auth::user()->name;

        // Checks if the user exist in the view table withe the postId, if not found the $postView will be null

        $postView = PostView::where([['post_id', '=' , $id],["user", '=' , $userName]])->exists();


        // Check if the user viwed this post, if not he adds the user to the view table


        // if $postView is null the user will be added to the table

        if($postView == null){

        // the user will be added to the base and shown the post with updaed count

            // Creating new View


            $view = new PostView();

            // the id of this post

            $view->post_id = $id;

            // the username that is loged in at the moment of clicking on the post

            $view->user = $userName;

            // saving the view to the table

            $view->save();



            $post_views = PostView::all()->where('post_id', $id);

            // updates the count every time someone clicks on the post by counting the number in the view table with the postId

                Post::where('id',$id)->update(['view_count' => DB::raw(count($post_views)) ]);


                return view('fullpage',['posts'=>$posts, 'comments'=>$comments]);
            }

            return view('fullpage',['posts'=>$posts, 'comments'=>$comments]);
}

        public function destroy($id){

            $post = Post::where('id', $id);

            $post->delete();

            return redirect('/posts');

        }

}
