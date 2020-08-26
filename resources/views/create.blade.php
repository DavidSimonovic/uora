@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
        <form method="POST" action="{{ route('create.store') }}">
            @csrf

            <!-- Title input  -->

            <div class="form-group">
              <label for="postTitle">Title</label>
              <input type="title" class="form-control" id="postTitle" name="blogTitle" placeholder="Title">
            </div>

            <!-- !Title input  -->

            <!-- Choose category input field dropdown -->

            <div class="form-group">
                <div class="dropdown show">
                    <label for="blogCategory">Category</label>
                    <select id="blogCategory" name="blogCategory" class="form-control">
                        <option value="">Select category</option>



                            <option value="category-value">category-name</option>


                    </select>
                  </div>
              </div>
              <div class="form-group">
                <div class="dropdown show">
                    <label for="blogCategory">City</label>
                    <select id="blogCategory" name="blogCategory" class="form-control">
                        <option value="">Select City</option>



                            <option value="category-value">category-city</option>


                    </select>
                  </div>
              </div>
              <div class="form-group">
                <div class="dropdown show">
                    <label for="blogCategory">Importants</label>
                    <select id="blogCategory" name="blogCategory" class="form-control">
                        <option value="">Select Importants</option>



                            <option value="category-value">category-important</option>


                    </select>
                  </div>
                  <div class="form-group">
                    <div class="dropdown show">
                        <label for="blogCategory">Type</label>
                        <select id="blogCategory" name="blogCategory" class="form-control">
                            <option value="">Select Type</option>



                                <option value="category-value">category-type</option>


                        </select>
                      </div>
            <!-- !Choose category input field -->

            <!-- Blog text input field -->

            <div class="form-group">
              <label for="blogText">BlogText</label>
              <textarea class="form-control" id="blogText" name="blogText" rows="3"></textarea>
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
