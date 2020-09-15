@extends('layouts.app')

@section('content')
<div class="container">

    <!-- ALERT SECTION -->

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

    <!-- ALERT SECTION -->

    <!-- NEW NEWS  -->

    <div class="row justify-content-center">

        <div class="col-md-12 col-12">

            @foreach ($newNews as $new)

            <div class="card">


                <div class="card-header text-center">
                <a href="/fullnews/{{$new->id}}"><h3>{{ $new->title }}</h3></a>
                </div>


                <div class="card-footer">

                    <!-- DELETE BUTTON -->
                    <div class="float-right">

                        @if(Auth::user()->user_role == "helper")
                            <form method="POST" action="/removenews/{{ $new->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                        @endif

                    </div>

                    <!-- !DELETE BUTTON -->

                    <!-- APROVE BUTTON -->
                    <div class="float-left">

                        @if(Auth::user()->user_role == "helper")

                            <form method="POST" action="/aprove/new/news/{{ $new->id }}">

                                @csrf
                                <button type="submit" class="btn btn-primary float-right">Approve</button>
                            </form>
                            @endif

                        </div>
                     <!-- !APROVE BUTTON -->

                </div>
             </div>
        </div>

        @endforeach


       <!-- !NEW NEWS  -->

</div>
@endsection
