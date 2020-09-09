@extends('layouts.app')

@section('content')
<style>
    .card{
        margin-bottom: 2vh;
    }
    #important{
        border: 2px solid red;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <!-- Questions -->

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
        @endforeach
        </div>
        <!-- !Questions -->

</div>
@endsection
