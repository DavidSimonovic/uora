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
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class CreateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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


        if(Auth::user()->state == 'banned'){

            return redirect()->back()->with('success','You can not write,you are banned.');

        }
        else{
        if($request['createType'] == 'post'){

        $post = new Post();
        $post->title = ucfirst($request['createTitle']);
        $post->author_id = Auth::user()->id;
        $post->type = 'Post';
        $post->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $post->text = $request['createText'];
        $post->city_id = $request['createCity'];
        $post->category_id = $request['createCategory'];

        if(!Post::where('title',$request['createTitle'])->exists()){

            $post->save();


            $post_count = count(Post::where('category_id',$request['createCategory'])->get());

            Category::where('id',$request['createCategory'])->update(['post_count' => DB::raw($post_count)]);

            return redirect()->back()->with('success','Post submited.');
    }
    else{

        return redirect()->back()->with('error','Post Title exists.');
    }



    }

    if($request['createType'] == 'question'){

        $question = new Question();

        $question->title = ucfirst($request['createTitle']);
        $question->author_id = Auth::user()->id;
        $question->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $question->type = 'Question';
        $question->text = $request['createText'];
        $question->city_id = $request['createCity'];
        $question->category_id = $request['createCategory'];

        if(!Question::where('title',$request['createTitle'])->exists()){


        $question->save();

        $question_count = count(Question::where('category_id',$request['createCategory'])->get());

        Category::where('id',$request['createCategory'])->update(['question_count' => DB::raw($question_count)]);


        return redirect()->back()->with('success','Question submited.');
        }
        else{

            return redirect()->back()->with('error','Question Title exists.');
        }
    }

    if($request['createType'] == 'helper'){

        $helper = new Helper();

        $helper->title = ucfirst($request['createTitle']);
        $helper->author_id = Auth::user()->id;
        $helper->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $helper->type = 'Helper Question';
        $helper->text = $request['createText'];
        $helper->city_id = $request['createCity'];
        $helper->category_id = $request['createCategory'];

        if(!Helper::where('title',$request['createTitle'])->exists()){

        $helper->save();

        return redirect()->back()->with('success','Helper question submited.');

        }else{

            return redirect()->back()->with('error','Helper Question Title exists.');
        }
    }
    if($request['createType'] == 'news'){

        $news = new News();

        $news->title = ucfirst($request['createTitle']);
        $news->author_id = Auth::user()->id;
        $news->author_name = Auth::user()->name.' '.Auth::user()->lastname;
        $news->text = $request['createText'];
        $news->importance = $request['createImportance'];
        $news->city_id = $request['createCity'];
        $news->category_id = $request['createCategory'];

        if(!News::where('title',$request['createTitle'])->exists()){

        $news->save();

        $news_count = count(News::where('category_id',$request['createCategory'])->get());

        Category::where('id',$request['createCategory'])->update(['news_count' => DB::raw($news_count)]);

            return redirect()->back()->with('success','News submited.');

        }else{

            return redirect()->back()->with('error','News Title Exists.');
        }
    }

    }

    }



}
