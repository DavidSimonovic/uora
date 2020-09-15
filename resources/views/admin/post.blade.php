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

    <!-- !ALERT-->

    <!-- POST -->
    <div class="row justify-content-center">

        <div class="col-md-12 col-12">


            <!-- FOREACH -->

            @foreach ($posts as $post)



            <div class="card">

                <!-- CARD HEADER -->

                <div class="card-header text-center">
                <a href="/fullpost/{{$post->id}}"><h3>{{ $post->title }}</h3></a>
                </div>
                <!-- !CARD HEADER  -->

                <div class="card-footer">

                    <div class="float-right">

                     <!-- To delete a post  -->
                        <form method="POST" action="/removepost/{{ $post->id }}">

                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                    <!-- !To delete a post  -->

                </div>



                    <div class="float-left">

                        <!-- If the post is aproved you can turn it back tu unaproved -->
                        @if($post->state == 'aproved')

                            <form method="POST" action="/hold/{{ $post->id }}">

                                @csrf
                                <button type="submit" class="btn btn-warning float-right">Hold</button>

                            </form>

                        @endif
                        <!-- !If the post is aproved you can turn it back tu unaproved -->

                        <!-- If the post is not aproved you can aprove it  -->
                        @if($post->state == 'new')

                        <form method="POST" action="/aprove/newpost/{{ $post->id }}">

                            @csrf
                            <button type="submit" class="btn btn-primary float-right">Approve</button>
                        </form>

                        @endif
                        <!-- !If the post is not aproved you can aprove it  -->
                </div>

                </div>

            </div>
            @endforeach
            <!-- !FOREACH -->
        </div>

    </div>

</div>
        <!-- !POST -->


@endsection
