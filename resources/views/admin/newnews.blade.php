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
            @foreach ($newNews as $new)
            <div class="card">
                <div class="card-header text-center">
                <a href="/fullnews/{{$new->id}}"><h3>{{ $new->title }}</h3></a>
                </div>
                <div class="card-footer">
                    @endforeach
                    <div class="float-right">
                        @if(Auth::user()->user_role == "helper")
                        <form method="POST" action="/removenews/{{ $new->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                            @endif
                    </div>
                    <div class="float-left">
                        @if(Auth::user()->user_role == "helper")
                        <form method="POST" action="/aprove/{{ $new->id }}">

                                @csrf
                                <button type="submit" class="btn btn-primary float-right">Approve</button>
                            </form>
                            @endif
                </div>
                </div>

            </div>
        </div>
        <!-- !Questions -->

</div>
@endsection
