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
    <div class="row justify-content-center">
        <!-- Questions -->
        <div class="col-md-12 col-12">
            @foreach ($users as $user)
            <div class="card">
                <div class="card-header text-center">
                <a href="/profil/{{$user->id}}"><h3>{{ $user->name }} {{ $user->lastname }}</h3></a>
                </div>
                <div class="card-footer">

                    <div class="float-right">


                        <form method="POST" action="/removeuser/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>

                    </div>
                    <div class="float-left">


                        <form method="POST" action="/ban/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-warning float-right">Ban</button>
                            </form>

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
