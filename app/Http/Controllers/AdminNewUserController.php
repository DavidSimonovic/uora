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

        return redirect('admin/new/users');

    }
    public function destroy($id){

        $user = User::where('id',$id);
        $user->delete();

        return redirect('/admin/new/users');
    }
}
