<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminNewUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $newusers = User::where('state','new')->get();

        return view('admin.newuser',['newusers'=>$newusers]);



    }


}
