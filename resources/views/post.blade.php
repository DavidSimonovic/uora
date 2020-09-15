@extends('layouts.app')

@section('content')
<!-- !posts -->
<div class="container">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="col-md-12 col-8">
            <div id='posts' class="card text-center">
            <div class="card-header"><a href="/fullpost/{{ $post->id }}"><h3>{{ $post->title }}</h3></a></div>

                <div class="card-body">

                    {{ $post->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $post->author_name }}</p><p class="float-right">{{ $post->view_count }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
        <!-- !posts -->

</div>
@endsection
