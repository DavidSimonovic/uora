@extends('layouts.app')

@section('content')

<style>
    .card{
        margin-bottom: 2vh;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="col-md-12 col-12">
            <div id='post' class="card text-center">
            <div class="card-header"><div class="float-left">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="float-right">
                @if(Auth::user()->user_role == "helper" or Auth::user()->id === $post->author_id)
                <form method="POST" action="/removepost/{{ $post->id }}">

                        @csrf
                        <button type="submit" class="btn btn-danger float-right">Remove</button>
                    </form>
                    @endif

            </div>

            </div>

                <div class="card-body">

                    {{ $post->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $post->author_name }}</p><p class="float-right">{{ $post->view_count }}</p>

                </div>

        </div>
        <div class="float-right">

            <a href="/report/{{'post'}}/{{$post->id}}">report</a>
            </div>

    </div>

    </div>


</div>
<br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-12">
        <!-- !posts -->
        <form method="POST" action="/fullpost/{{ $post->id }}">

            @csrf



            <!-- Blog text input field -->

            <div class="form-group ">
                <div id='post' class="card">
                    <div class="card-header text-center">


              <label for="createComment"><h2>Comment</h2></label>
                    </div>
              <div class="card-body">
              <textarea class="form-control" id="createComment" name="createComment" rows="3"></textarea>
                    </div>
                    <div class="card-footer">
                        <!-- Submit button  -->

                         <button type="submit" class="btn btn-primary float-right">Submit</button>

                        <!-- !Submit button  -->
                    </div>
                </div>
            </div>

            @endforeach
            <!-- !Blog text input field -->




                </form>
            </div>
        </div>
</div>


<div class="container">
        <!-- Comment section -->
            <div class="row justify-content-center">
                @foreach ($comments as $comment)
                <div class="col-md-12 col-12">
                    <div id='post' class="card text-center">
                        <div class="card-header text-center">
                            <p class="float-left">{{ $comment->author_name }}</p><p class="float-right">{{ $comment->created_at }}</p>
                                  </div>
                        <div class="card-body">

                            {{ $comment->comment }}

                        </div>

                        <div class="card-footer">

                            @if(Auth::user()->user_role == "helper" or Auth::user()->id === $comment->author_id)
                        <form method="POST" action="/removepostcomment/{{ $comment->post_id }}/{{ $comment->id }}">

                                @csrf
                                <button type="submit" class="btn btn-primary float-right">Remove</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>


            <!-- !Comment section -->


@endsection
