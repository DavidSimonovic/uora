@extends('layouts.app')

@section('content')
<style>
    .card{
        margin-bottom: 2vh;
    }

    a {
        text-decoration: none !important;
    }
</style>
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
                        @if(Auth::user()->user_role == "helper")
                        <form method="POST" action="/aprove/{{ $question->id }}">

                                @csrf
                                <button type="submit" class="btn btn-primary float-right">Approve</button>
                            </form>
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
