@extends('layouts.app')

@section('content')
<style>
    .card{
    margin-bottom: 5vh !important;
    }
    #question{
        height: 20vh;
        border: 2px solid skyblue;
    }
    #posts{
        border: 2px solid green;
        height: 90vh !important;
    }
    #important{
                border: 3px solid red;
            }
    #news{
        border: 2px solid orange;
    }
    </style>
<div class="container">
    <div class="row justify-content-center">
       @foreach ($posts as $post)


        <div class="col-md-12 col-8">
            <div id="posts" class="card text-center">
            <div class="card-header"><h3>{{ $post->title }}</h3></div>

                <div class="card-body">

                    {{ $post->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $post->author }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <!-- Questions -->
        @foreach ($questions as $question)
        <div class="col-md-12 col-8">
            <div id='question' class="card text-center">
            <div class="card-header"><h3>{{ $question->title }}</h3></div>

                <div class="card-body">

                    {{ $question->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">Author</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        <!-- !Questions -->

        <div class="row justify-content-center">
        <!-- Questions -->
        @foreach ($news as $new)
        @if( $new->importance == 'important')

        <div class="col-md-12 col-8">
            <div id="important" class="card text-center">
            <div class="card-header"><h3>{{ $new->title }}</h3></div>

                <div class="card-body">

                    {{ $new->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">Author</p>
                </div>
            </div>
        </div>
        @endif
        </div>

        <div  class="row justify-content-center">
        <div class="col-md-12 col-8">
            <div id="news" class="card text-center">
            <div class="card-header"><h3>{{ $new->title }}</h3></div>

                <div class="card-body">

                    {{ $new->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">Author</p>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        <!-- !Questions -->

</div>
@endsection
