@extends('layouts.app')

@section('content')
<div class="container">

    <!-- ALERT SECTION -->
    <div class="row justify-content-center">
        <div class="col-sm-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('delete'))
        <div class="alert alert-success">
            {{ session()->get('delete') }}
        </div>
        @endif
        </div>
    </div>

    <!-- !ALERT SECTION -->


    <!--QUESTIONS-->

    <div class="row justify-content-center">


        <div class="col-md-12 col-12">
            @foreach ($allHelperQuestions as $question)
            <div class="card">
                <div class="card-header text-center">
                <a href="/helper/full/{{$question->id}}"><h3>{{ $question->title }}</h3></a>
                </div>
                <div class="card-footer">

                    <div class="float-right">

                        @if(Auth::user()->user_role == "helper")
                        <form method="POST" action="/removehelperquestion/{{ $question->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                            @endif
                    </div>
                    <div class="float-left">

                       @if($question->state == 'answered')

                       <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                      </svg>

                       @endif
                </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>

</div>
       <!-- !QUESTIONS-->

</div>
@endsection
