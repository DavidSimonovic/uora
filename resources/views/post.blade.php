@extends('layouts.app')

@section('content')
<!-- style -->
<style>
    a {

  text-decoration: none !important;

}
</style>
<!-- !style -->

<!-- !posts -->
<div class="container">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="col-md-12 col-8">
            <div id='post' class="card text-center">
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
