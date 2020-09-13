@extends('layouts.app')

@section('content')
<style>
    .card{
        margin-bottom: 2vh;
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
        <!-- reports -->
        <div class="col-md-12 col-12">
            @foreach ($reports as $report)
            <div class="card">
                <div class="card-header text-center">
                <a href="/full{{$report->type}}/{{$report->report_id}}"><h3>{{ $report->title }}</h3></a>
                </div>
                <div class="card-footer">

                    <div class="float-right">


                    <form method="POST" action="/remove{{$report->type}}/{{ $report->report_id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>

                    </div>
                    <div class="float-left">

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
