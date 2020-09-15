@extends('layouts.app')

@section('content')

<div class="container">

    <!-- ALERT -->
    <div class="row justify-content-center">

        <div class="col-sm-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

    </div>

    </div>
    <!-- !ALERT -->

    <div class="row justify-content-center">
        <!-- reports -->
        <div class="col-md-12 col-12">
            @foreach ($reports as $report)
            <div class="card">

                <!-- Post Title -->
                <div class="card-header text-center">
                <a href="/full{{$report->type}}/{{$report->report_id}}"><h3>{{ $report->title }}</h3></a>
                </div>
                <!-- !Post Title -->

                <div class="card-body">

                   <h2>Reason: {{ $report->reason }}</h2>

                   <h4>
                    {{ $report->description }}
                   </h4>

                </div>
                <div class="card-footer">

                    <div class="float-right">

                        <!-- Remove post/question -->
                            <form method="POST" action="/remove{{$report->type}}/{{ $report->report_id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                        <!-- !Remove -->
                    </div>
                    <div class="float-left">

                        <!-- Dissmis the report -->
                        <form method="POST" action="/dissmis/{{ $report->report_id }}">

                            @csrf
                            <button type="submit" class="btn btn-success float-right">Dissmis</button>
                        </form>
                        <!-- !Dissmis -->
                </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>

</div>
        <!-- !reports -->

</div>
@endsection
