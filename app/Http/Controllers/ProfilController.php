<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(){

    $id = Auth::user()->id;
    $user_info = User::find($id);


    return view('profil',['user_info' => $user_info ]);
    }

    public function show($id){

        $user_info = User::find($id);


    return view('profil',['user_info' => $user_info ]);

    }

    public function edit(){

    }

    public function destroy(){

    }
    public function update(){

    }
}
