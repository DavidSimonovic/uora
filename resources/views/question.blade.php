@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <!-- Questions -->
        @foreach ($questions as $question)

            <div class="col-md-12 col-8">
            <div id='question' class="card text-center">
            <div class="card-header"><a href="/fullquestion/{{ $question->id }}"><h3>{{ $question->title }}</h3></a></div>

                <div class="card-body">

                    {{ $question->text }}
                </div>

                <div class="card-footer">
                    <p class="float-left">{{ $question->author_name }}</p><p class="float-right">{{ $question->view_count }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        <!-- !Questions -->

</div>
@endsection
