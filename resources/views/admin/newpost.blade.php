@extends('layouts.app')

@section('content')
<style>
    .card{
        margin-bottom: 2vh;
    }
    #important{
        border: 2px solid red;
    }
    a {
        text-decoration: none !important;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <!-- Questions -->
        <div class="col-md-12 col-12">
            @foreach ($newposts as $post)
            <div class="card">
                <div class="card-header text-center">
                <a href="/fullpost/{{$post->id}}"><h3>{{ $post->title }}</h3></a>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        @if(Auth::user()->user_role == "helper")
                        <form method="POST" action="/removepost/{{ $post->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                            @endif
                    </div>
                    <div class="float-left">
                        @if(Auth::user()->user_role == "helper")
                        <form method="POST" action="/aprove/newpost{{ $post->id }}">

                                @csrf
                                <button type="submit" class="btn btn-primary float-right">Approve</button>
                            </form>
                            @endif
                    </div>
                </div>
                </div>
            @endforeach

        </div>
        <!-- !Questions -->

</div>
@endsection
