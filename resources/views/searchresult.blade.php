@extends('layouts.app')

@section('content')
<style>
    .card{
    margin-bottom: 5vh !important;
    }
    #question{

        border: 2px solid skyblue;
    }
    #posts{
        border: 2px solid green;

    }
    #important{
                border: 3px solid red;
            }
    #news{
        border: 2px solid orange;
    }
    a{
        text-decoration: none !important;
    }
    </style>



<div class="container">
    <div class="row justify-content-center">


        @isset($posts)

        @foreach ($posts as $post)


        <div class="col-md-12 col-8">
            <div id="posts" class="card text-center">
            <div class="card-header"><a href="/fullpost/{{$post->id}}"><h3>{{ $post->title }}</h3></a></div>

                <div class="card-body">

                    {{ $post->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $post->author_name }}</p><p class="float-right">{{ $post->view_count }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endisset

    @isset($questions)


    <div class="row justify-content-center">
        <!-- Questions -->
        @foreach ($questions as $question)
            <div class="col-md-12 col-8">
                <div id='question' class="card text-center">

                <div class="card-header"><a href="/fullquestion/{{$question->id}}"><h3>{{ $question->title }}</h3></a></div>

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

    @endisset
        <!-- !Questions -->
    @isset($news)

        <div class="row justify-content-center">
        <!-- News -->
        @foreach ($news as $new)

        @if( $new->importance == 'important')

        <div class="col-md-12 col-8">

            <div id="important" class="card text-center">

                <div class="card-header"><a href="/fullnews/{{$new->id}}"><h3>{{ $new->title }}</h3></a></div>

                <div class="card-body">

                    {{ $new->text }}
                </div>

                <div class="card-footer">
                    <p class="float-left">{{ $new->author_name }}</p><p class="float-right">{{ $new->view_count }}</p>
                </div>

            </div>

        </div>

        @endif

    </div>



        <div  class="row justify-content-center">

            @if( $new->importance == 'normal')
        <div class="col-md-12 col-8">
            <div id="news" class="card text-center">
            <div class="card-header"><a href=""><h3>{{ $new->title }}</h3></a></div>

                <div class="card-body">

                    {{ $new->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $new->author_name }}</p><p class="float-right">{{ $new->view_count }}</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        </div>
        @endisset
        <!-- !Questions -->


        @isset($noPost)


        <div  class="row justify-content-center">

        <div class="col-md-12 col-12">
            <div class="card text-center">
            <div class="card-header"><h3>No post found</h3></div>

                <div class="card-body">

                    <h4>"{{ $searchItem }}"</h4>
                </div>

            </div>
        </div>


        </div>
        @endisset


</div>
@endsection
