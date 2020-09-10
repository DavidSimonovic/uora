<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Question;
use App\Report;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index($type,$id){

        if($type === 'post'){

            $title = Post::find($id);



            return view('report',['title'=>$title,'type'=>$type]);
        }

        if($type === 'question'){

            $title = Question::find($id);


            return view('report',['title'=>$title,'type'=>$type]);
        }


    }



    public function store(Request $request, $type, $id){


        $report = Report::where([['report_id',$id],['type',$type],['reporter_id',Auth::user()->id]])->exists();

        if($report == null ){

        if($type == 'post'){




            $postTitle = Post::find($id);

            $report = new Report();
            $report->report_id = $id;
            $report->title = $postTitle->title;
            $report->type = $type;
            $report->reporter_id = Auth::user()->id;
            $report->reporter_name = Auth::user()->name.' '.Auth::user()->lastname;
            $report->description = $request['reportDetails'];

            $report->reason = $request['reportReson'];

            $report->save();

            return redirect()->back()->with('success', 'Report Submited');

        }

        if($type == 'question'){



               $postTitle = Question::find($id);

               $report = new Report();
               $report->report_id = $id;
               $report->title = $postTitle->title;
               $report->type = $type;
               $report->reporter_id = Auth::user()->id;
               $report->reporter_name = Auth::user()->name.' '.Auth::user()->lastname;
               $report->description = $request['reportDetails'];

               $report->reason = $request['reportReson'];

               $report->save();

                $success = "You'r report is submited"
;
               return redirect()->back()->with('success', 'Report Submited');

           }
        }

        else{
            return redirect()->back()->with('error', 'You already reported this');
        }
    }
    }


