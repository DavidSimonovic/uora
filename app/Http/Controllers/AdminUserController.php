<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = User::all();

        return view('admin.users',['users'=>$users]);
    }

    public function update($id)
    {

        $user = User::where('id',$id)->first();

        if($user->state == 'aproved'){

        User::where('id',$id)->update(['state'=>'banned']);

        return redirect()->back()->with('success','The user is banned');

    }

        elseif( $user->state == 'banned')
    {

        User::where('id',$id)->update(['state'=>'aproved']);

        return redirect()->back()->with('success','The user is unbaned');
    }

}
}
