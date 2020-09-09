<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminUserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('admin.users',['users'=>$users]);
    }

}
