@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-8">



        <form method="GET" action="/category/">

                <!-- Choose category input field dropdown -->

                <div class="form-group">
                    <div class="dropdown show">
                        <label for="id">Category</label>
                        <select id="id" name="id" class="form-control">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>

                            @endforeach

                        </select>
                      </div>
                  </div>



                <!-- Submit button  -->

                <button type="submit" class="btn btn-primary float-right">Filter</button>

                <!-- !Submit button  -->

                </form>
        </div>
    </div>

    <br/>

    <div class="row justify-content-center">
       @foreach ($posts as $post)


        <div class="col-md-12 col-8">
            <div id="posts" class="card text-center">
            <div class="card-header"><a href="/fullpost/{{$post->id}}"><h3>{{ $post->title }}</h3></a></div>

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

    <div class="row justify-content-center">
        <!-- Questions -->
        @foreach ($questions as $question)
        <div class="col-md-12 col-8">
            <div id='question' class="card text-center">

            <div class="card-header"><a href="/fullquestion/{{$question->id}}"><h3>{{ $question->title }}</h3></a></div>

                <div class="card-body">

                    {{ $question->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $question->author_name }}</p><p class="float-right">{{ $question->view_count }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        <!-- !Questions -->

        <div class="row justify-content-center">
        <!-- Questions -->


        <div class="col-md-12 col-8">
            <div

            @foreach ($news as $new)
            @if( $new->importance == 'important')
                id="important"
            @endif

            @if( $new->importance == 'normal')
            id="news"
            @endif



            class="card text-center">
            <div class="card-header"><a href="/fullnews/{{$new->id}}"><h3>{{ $new->title }}</h3></a></div>

                <div class="card-body">

                    {{ $new->text }}
                </div>
                <div class="card-footer">
                    <p class="float-left">{{ $new->author_name }}</p><p class="float-right">{{ $new->view_count }}</p>
                </div>
            </div>
        </div>

        </div>


        @endforeach
        </div>
        <!-- !Questions -->

</div>
@endsection
