@extends('layouts.app')

@section('content')
<style>
a:link{
      text-decoration: none;
  }
  a
  {

    color:grey;

  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ $user_info->name }} {{ $user_info ->lastname }}</div>

                <div class="card-body">
                  <div class="float-left"></div>
                  <div class="float-right"><table class="table table-hover">
                    <thead>
                      <tr>

                        <th>Type</th>
                        <th>Total views</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Posts</td>

                        <td>john@example.com</td>
                      </tr>
                      <tr>
                        <td>Questions</td>

                        <td>mary@example.com</td>
                      </tr>
                      <tr>
                        <td col=2>All views</td>

                        <td>july@example.com</td>
                      </tr>
                    </tbody>
                  </table></div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
