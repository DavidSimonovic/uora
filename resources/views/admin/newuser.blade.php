@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Alert -->
    <div class="row justify-content-center">
        <div class="col-sm-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        </div>

    </div>
    <!-- !Alert -->

    <div class="row justify-content-center">
        <!-- Questions -->
        <div class="col-md-12 col-12">
            @foreach ($newusers as $user)
            <div class="card">
                <div class="card-header text-center">
                   <!-- Author -->
                <a href="/profil/{{$user->id}}"><h3>{{ $user->name }} {{ $user->lastname }}</h3></a>

                    <!-- !Author -->
                </div>
                <div class="card-footer">

                    <div class="float-right">

                        <!-- Remove user -->
                        <form method="POST" action="/removeuser/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                        </form>
                        <!-- !Remove user -->

                    </div>
                    <div class="float-left">

                        <!-- Aprove new user -->
                        <form method="POST" action="/aprove/newuser/{{ $user->id }}">

                                @csrf
                                <button type="submit" class="btn btn-primary float-right">Approve</button>
                            </form>

                        <!-- !Aprove new user -->

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
