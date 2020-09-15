@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ $user_info->name }} {{ $user_info ->lastname }}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">View count</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_posts as $post)
                            <tr>



                            <th scope="row"></th>
                            <td><a href="/fullpost/{{ $post->id }}">{{ $post->title }}</a></td>
                            <td>{{ $post->type }}</td>
                            <td>{{ $post->view_count }}</td>


                          </tr>
                          @endforeach
                          @foreach ($all_question as $question)
                          <tr>



                            <th scope="row"></th>
                          <td><a href="/fullquestion/{{ $question->id }}">{{ $question->title }}</a></td>
                            <td>{{ $question->type }}</td>
                            <td>{{ $question->view_count }}</td>


                          </tr>
                          @endforeach

                        </tbody>
                      </table>

            </div>
        </div>
    </div>
</div>
@endsection
