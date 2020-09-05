@extends('layouts.app')

@section('content')

<style>
    .card{
        margin-bottom: 2vh;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        @foreach ($questions as $question)
        <div class="col-md-12 col-8">
            <div id='post' class="card text-center">
                <div class="card-header"><div class="float-left">
                    <h3>{{ $question->title }}</h3>
                </div>
                <div class="float-right">
                    @if(Auth::user()->user_role == "helper" or Auth::user()->id === $question->author_id)
                    <form method="POST" action="/removequestion/{{ $question->id }}">

                            @csrf
                            <button type="submit" class="btn btn-danger float-right">Remove</button>
                        </form>
                        @endif
                </div>

                </div>

                <div class="card-body">

                    {{ $question->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $question->author_name }}</p><p class="float-right">{{ $question->view_count }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-8">
        <!-- !posts -->
        <form method="POST" action="/fullquestion/{{ $question->id }}">

            @csrf



            <!-- Blog text input field -->

            <div class="form-group ">
                <div id='post' class="card">
                    <div class="card-header text-center">
                        <label for="createAnswer"><h2 >Answer</h2></label>
                    </div>
              <div class="card-body">
                 <textarea class="form-control" id="createAnswer" name="createAnswer" rows="3"></textarea>
                    </div>
                    <div class="card-footer">
                        <!-- Submit button  -->

                         <button type="submit" class="btn btn-primary float-right">Submit</button>

                        <!-- !Submit button  -->
                    </div>
                </div>
            </div>

            @endforeach
            <!-- !Blog text input field -->




                </form>
            </div>
        </div>
</div>


<div class="container">
        <!-- answer section -->
            <div class="row justify-content-center">
                @foreach ($answers as $answer)
                <div class="col-md-12 col-8">
                    <div id='post' class="card text-center">
                        <div class="card-header text-center">
                            <p class="float-left">{{ $answer->author_name }}</p><p class="float-right">{{ $answer->created_at }}</p>
                                  </div>
                        <div class="card-body">

                            {{ $answer->answer }}

                        </div>

                        <div class="card-footer">

                            @if(Auth::user()->user_role == "helper" or Auth::user()->id === $answer->author_id)

                            <form method="POST" action="/removeanswer/{{$answer->question_id }}/{{ $answer->id }}">

                                @csrf
                                <button type="submit" class="btn btn-primary float-right">Remove</button>
                            </form>

                            @endif
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>


            <!-- !answer section -->


@endsection
