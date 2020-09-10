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
        <div class="col-sm-8">

        <form method="POST" action="/reported/{{ $type }}/{{ $title->id }}">
            @csrf

            <!-- Title input  -->

            <div class="form-group">
              <label for="createTitle">Title</label>
              <h1>{{ $title->title }}</h1>
            </div>


            <!-- Choose category input field dropdown -->

            <div class="form-group">
                <div class="dropdown show">
                    <label for="reportReson">Reason</label>
                    <select id="reportReson" name="reportReson" class="form-control">

                        <option value="insults">Insults</option>
                        <option value="adultery">Adultery</option>
                        <option value="falsInfo">False Info</option>
                        <option value="harasment">Harasment</option>

                    </select>
                  </div>
              </div>

            <!-- Blog text input field -->

            <div class="form-group">
              <label for="reportDetails">Describe details</label>
              <textarea class="form-control" id="reportDetails" name="reportDetails" rows="3"></textarea>
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
