<?php

namespace App\Http\Controllers;

use App\ArthritisType;
use App\City;
use App\Helper;
use App\Post;
use App\Question;
use App\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){

    $id = Auth::user()->id;
    $user_info = User::find($id);
    $arthritis_type = ArthritisType::all();
    $user_city = City::where('id',Auth::user()->city_id);
    $cities = City::all();
    $all_posts = Post::where('author_id',Auth::user()->id)->get();
    $all_question = Question::where('author_id',Auth::user()->id)->get();
    $all_helper_question = Helper::where('author_id',Auth::user()->id)->get();

    return view('profiledit',['user_info' => $user_info ,
    'arthritisType'=>$arthritis_type,
    'cities'=>$cities,
    'all_posts'=>$all_posts ,
    'all_question'=>$all_question,
    'all_helper_question'=>$all_helper_question
    ]);
    }



    public function show($id){



    $user_info = User::find($id);
    $all_posts = Post::where('author_id',$id)->get();
    $all_question = Question::where('author_id',$id)->get();


    return view('profil',
    [

    'user_info' => $user_info ,
    'all_posts'=>$all_posts ,
    'all_question'=>$all_question,

    ]);

    }


    public function edit(Request $request){


    $pdata = array(
            'name'=> ucfirst($request['name']),
            'lastname'=>ucfirst($request['lastname']),
            'city_id'=>$request['city'],
            'arthritis_type'=>$request['arthritisType']
        );

        User::where('id', Auth::user()->id)->update($pdata);


        return redirect()->back()->with('success','Profil updated');
    }


}
