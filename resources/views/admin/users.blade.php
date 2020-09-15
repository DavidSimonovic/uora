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

        @if(session()->has('unban'))
        <div class="alert alert-success">
            {{ session()->get('undan') }}
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

                        @if($user->state == 'aproved')
                        <form method="POST" action="/ban/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-warning float-right">Ban</button>
                        </form>
                        @endif

                        @if($user->state == 'banned')

                        <form method="POST" action="/ban/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-success float-right">Unban</button>
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
