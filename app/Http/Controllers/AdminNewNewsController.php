<?php

namespace App\Http\Controllers;
use App\News;

use Illuminate\Http\Request;

class AdminNewNewsController extends Controller
{
    public function index(){

        $newNews = News::where('state','new')->get();

        return view('admin.newnews',['newNews' => $newNews]);
    }

    public function update($id){

        News::where('id',$id)->update(['state'=>'aproved']);

        return redirect('admin/new/news');

    }


}
