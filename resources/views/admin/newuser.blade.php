@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        </div>
        <div class="col-sm-8">
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
            @foreach ($newusers as $user)
            <div class="card">
                <div class="card-header text-center">
                <a href="/profil/{{$user->id}}"><h3>{{ $user->name }} {{ $user->lastname }}</h3></a>
                </div>
                <div class="card-footer">

                    <div class="float-right">

                        @if(Auth::user()->user_role == "helper")
                        <form method="POST" action="/removeuser/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                            @endif
                    </div>
                    <div class="float-left">
                        @if(Auth::user()->user_role == "helper")

                        <form method="POST" action="/aprove/newuser/{{ $user->id }}">

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
        <!-- !Questions -->

</div>
@endsection
