<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Report;
use App\QuestionView;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $questions = Question::all();

        return view( 'question' , ['questions' => $questions]);

    }

    public function show($id){

        $questions = Question::where('id',$id)->get();

        $answers = Answer::where('question_id',$id)->get();

        // Here change to counting from the base so the views are not spam

        $userName = Auth::user()->name;

        // Checks if the user exist in the view table withe the postId, if not found the $QuestionView will be null

        $QuestionView = QuestionView::where([['question_id', '=' , $id],["user", '=' , $userName]])->exists();


        // Check if the user viwed this post, if not he adds the user to the view table


        // if $QuestionView is null the user will be added to the table

        if($QuestionView == null){

        // the user will be added to the base and shown the post with updaed count

            // Creating new View


            $question = new QuestionView();

            // the id of this post

            $question->question_id = $id;

            // the username that is loged in at the moment of clicking on the post

            $question->user = $userName;

            // saving the view to the table

            $question->save();



            $question_views = QuestionView::all()->where('question_id', $id);

            // updates the count every time someone clicks on the post by counting the number in the view table with the postId

            Question::where('id',$id)->update(['view_count' => DB::raw(count($question_views)) ]);


                return view('fullquestion' , ['questions' => $questions, 'answers' => $answers]);
            }





        return view('fullquestion' , ['questions' => $questions, 'answers' => $answers]);
    }

    public function destroy($id){

         Question::where('id', $id)->delete();

         Report::where([['report_id',$id],['type','question']])->delete();



        return redirect('/home')->with('delete', 'Successfull Deleted');

    }
    public function edit($id){

    }

}
