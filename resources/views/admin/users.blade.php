@extends('layouts.app')

@section('content')
<div class="container">
    <!-- -->
    <div class="row justify-content-center">

        <div class="col-sm-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(session()->has('unban'))
        <div class="alert alert-success">
            {{ session()->get('unban') }}
        </div>
        @endif

        </div>

    </div>

    <!-- -->

    <div class="row justify-content-center">
        <!-- Questions -->
        <div class="col-md-12 col-12">
            @foreach ($users as $user)
            <div class="card">
                <!-- -->
                <div class="card-header text-center">
                <a href="/profil/{{$user->id}}"><h3>{{ $user->name }} {{ $user->lastname }}</h3></a>
                </div>
                <!-- -->
                <div class="card-footer">

                    <div class="float-right">

                        <!-- Remove User -->

                        <form method="POST" action="/removeuser/{{ $user->id }}">

                                @csrf

                                <button type="submit" class="btn btn-danger float-right">Remove</button>

                        </form>

                        <!-- !Remove User -->

                    </div>

                    <div class="float-left">

                        <!-- Gives option to ban a user who is aproved -->

                        @if($user->state == 'aproved')
                        <form method="POST" action="/ban/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-warning float-right">Ban</button>
                        </form>
                        @endif

                        <!-- !Ban User -->

                        <!-- Gives option to unban user -->

                        @if($user->state == 'banned')

                        <form method="POST" action="/ban/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-success float-right">Unban</button>
                        </form>

                        @endif

                        <!-- !Unban -->
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
