@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
        <form method="POST" action="{{ route('create.create') }}">
            @csrf

            <!-- Title input  -->

            <div class="form-group">
              <label for="createTitle">Title</label>
              <input type="title" class="form-control" id="createTitle" name="createTitle" placeholder="Title">
            </div>

            <!-- !Title input  -->

            <div class="form-group">
                <div class="dropdown show">
                    <label for="createType">Type</label>
                    <select id="createType" name="createType" class="form-control">


                        <option value="post">Post</option>

                            <option value="question">Question</option>

                            <option value="helper">Question for the Helper</option>

                            <!-- Helpers only can write news -->
                            @if(Auth::user()->user_role == 'helper')

                                <option value="news">News</option>

                            @endif
                            <!-- !Helpers only can write news -->
                    </select>
                </div>
            </div>

            @if(Auth::user()->user_role == 'helper')
            <div class="form-group">
                <div class="dropdown show">
                    <label for="createImportance">Importance</label>
                    <select id="createImportance" name="createImportance" class="form-control">

                        <option value="important">Important</option>
                        <option value="normal">Normal</option>

                    </select>
                  </div>
              </div>



            @endif

            <!-- Choose category input field dropdown -->

            <div class="form-group">
                <div class="dropdown show">
                    <label for="createCategory">Category</label>
                    <select id="createCategory" name="createCategory" class="form-control">
                        @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach

                    </select>
                  </div>
              </div>


              <div class="form-group">
                <div class="dropdown show">
                    <label for="createCity">City</label>
                    <select id="createCity" name="createCity" class="form-control">
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->title }}</option>
                        @endforeach







                    </select>
                  </div>
              </div>



            <!-- !Choose category input field -->

            <!-- Blog text input field -->

            <div class="form-group">
              <label for="createText">Text</label>
              <textarea class="form-control" id="createText" name="createText" rows="3"></textarea>
            </div>

            <!-- !Blog text input field -->



            <!-- Submit button  -->

            <button type="submit" class="btn btn-primary">Submit</button>

            <!-- !Submit button  -->

            </form>
        </div>
    </div>
</div>
@endsection
