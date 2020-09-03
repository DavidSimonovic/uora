<?php

namespace App\Http\Controllers;
use App\ArthritisType;
use App\City;
use App\Post;
use App\Category;
use App\Question;
use App\Helper;
use App\News;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index(){


        $cities = City::all();
        $categories = Category::all();
        return view('create', ['cities' => $cities, 'categories' => $categories ]);
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'createTitle' => ['required', 'string', 'max:50'],
            'createText' => ['required','text','max:500']


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Post
     */
    protected function create(Request $request)
    {
        if($request['createType'] == 'post'){

        $post = new Post();
        $post->title = $request['createTitle'];
        $post->author_id = Auth::user()->id;
        $post->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $post->text = $request['createText'];
        $post->city_id = $request['createCity'];
        $post->category_id = $request['createCategory'];
        $post->save();

        return redirect('/home');
    }

    if($request['createType'] == 'question'){
        $question = new Question();

        $question->title = $request['createTitle'];
        $question->author_id = Auth::user()->id;
        $question->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $question->text = $request['createText'];
        $question->city_id = $request['createCity'];
        $question->category_id = $request['createCategory'];
        $question->save();

        return redirect('/home');
    }

    if($request['createType'] == 'helper'){

        $helper = new Helper();

        $helper->title = $request['createTitle'];
        $helper->author_id = Auth::user()->id;
        $helper->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $helper->text = $request['createText'];
        $helper->city_id = $request['createCity'];
        $helper->category_id = $request['createCategory'];
        $helper->save();

        return redirect('/home');
    }
    if($request['createType'] == 'news'){

        $news = new News();

        $news->title = $request['createTitle'];
        $news->author_id = Auth::user()->id;
        $news->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $news->text = $request['createText'];
        $news->importance = $request['createImportance'];
        $news->city_id = $request['createCity'];
        $news->category_id = $request['createCategory'];

        $news->save();

        return redirect('/home');
    }

    }



}
