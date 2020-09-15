<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update($id){

        User::where('id',$id)->update(['state'=>'aproved']);

        return redirect()->back()->with('success','User aproved');

    }
    public function destroy($id){

        User::where('id',$id)->delete();

        return redirect()->back()->with('delete', 'User Deleted');

    }
}
