<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminNewUserController extends Controller
{
    public function index(){

        $newusers = User::where('state','new')->get();

        return view('admin.newuser',['newusers'=>$newusers]);



    }


    public function update($id){

        User::where('id',$id)->update(['state'=>'aproved']);

        return redirect()->back()->with('success','User aproved');

    }
    public function destroy($id){

        User::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'User Deleted');

    }
}
