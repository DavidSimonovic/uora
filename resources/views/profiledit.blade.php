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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update profil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profil.edit') }}">
                        @csrf

                        <!--name  -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="{{ $user_info->name }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- !name  -->

                        <!-- ADD CITY DROPDOWN LIST -->

                        <!-- lastname  -->
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                            <input id="lastname" placeholder="{{ $user_info->lastname }}" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- !lastname  -->


                        <!-- arthritisType -->
                        <div class="form-group row">
                            <label for="arthritisType" class="col-md-4 col-form-label text-md-right">{{ __('Arthritis type') }}</label>

                            <div class="col-md-6">

                                <select id="arthritisType" name="arthritisType" class="form-control">
                                    <option value="{{ $user_info->arthritis_type }}">{{ $user_info->arthritis_type }}</option>

                                    @foreach($arthritisType as $type)
                                        <option value="{{ $type->title }}">{{ $type->title }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <!-- !arthritisType -->

                        <!-- City -->
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">

                                <select id="city" name="city" class="form-control">


                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <!-- !City -->



                        <!-- submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        <!-- !submit -->

                    </form>
                </div>
            </div>
        </div>

    </div>
    <br/>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">You posts,questions and questions for the helper</div>

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
                          @foreach ($all_helper_question as  $hquestion)
                          <tr>



                            <th scope="row"></th>
                          <td><a href="/helper/full/{{ $hquestion->id }}">{{$hquestion->title }}</a></td>
                            <td>{{ $hquestion->type }}</td>
                            <td>{{ $hquestion->view_count }}</td>


                          </tr>
                          @endforeach
                        </tbody>
                      </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
