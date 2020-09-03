<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

    if(Auth::user()->user_role == 'helper'){

        return view('admin.home');
    }
    else{

        return redirect('/home');

    }
    }
}
