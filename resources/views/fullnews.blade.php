@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($news as $new)
        <div class="col-md-12 col-12">
            <div @if($new->importance == 'important')

                    id='important'

                    @endif
                    @if($new->importance == 'important')


                    id='normal'

                    @endif

                class="card text-center">
                <div class="card-header"><div class="float-left">
                    <h3>{{ $new->title }}</h3>
                </div>

                <div class="float-right">

                    @if(Auth::user()->user_role == "helper" or Auth::user()->id === $new->author_id)
                            <form method="POST" action="/removenews/{{ $new->id }}">

                            @csrf
                            <button type="submit" class="btn btn-danger float-right">Remove</button>
                            </form>
                        @endif
                </div>

                </div>

                <div class="card-body">

                    {{ $new->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $new->author_name }}</p><p class="float-right">{{ $new->view_count }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-12">
        <!-- !posts -->
        <form method="POST" action="/fullnews/{{ $new->id }}">

            @csrf



            <!-- Blog text input field -->

            <div class="form-group ">
                <div id='post' class="card">
                    <div class="card-header text-center">
                        <label for="createcomment"><h2 >comment</h2></label>
                    </div>
              <div class="card-body">
                 <textarea class="form-control" id="createcomment" name="createcomment" rows="1"></textarea>
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
        <!-- comment section -->
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

                             <form method="POST" action="/removenewscomment/{{ $comment->news_id }}/{{ $comment->id }}">

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


            <!-- !comment section -->


@endsection
