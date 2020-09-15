@extends('layouts.app')

@section('content')
<div class="container">


    <!-- Alert -->
    <div class="row justify-content-center">

        <div class="col-sm-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif


        </div>

    <!-- !Alert -->

    </div>
    <div class="row justify-content-center">
        <!-- Questions -->
        <div class="col-md-12 col-12">
            @foreach ($questions as $question)
            <div class="card">
                <div class="card-header text-center">
                <a href="/fullquestion/{{$question->id}}"><h3>{{ $question->title }}</h3></a>
                </div>
                <div class="card-footer">

                    <div class="float-right">

                        <!-- Remove question -->
                        <form method="POST" action="/removequestion/{{ $question->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                            <!-- !Remove question -->
                    </div>

                    <div class="float-left">
                    <a href="/profil/{{ $question->author_id }}">{{ $question->author_name }} </a>
                </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>

</div>
        <!-- !Questions -->

</div>
@endsection
