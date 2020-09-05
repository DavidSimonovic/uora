@extends('layouts.app')

@section('content')
<!--style-->
<style>
    .card{
        margin-bottom: 1vh;
    }
    #report h3{
        color: red;

    }
    .card a{

        text-decoration: none !important;
    }
</style>
<!--!style -->

<!-- new questions-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-12">
            <div  class="card text-center">
            <div class="card-header">
                <a href="{{ route('admin.question') }}">
                <h1> New questions</h1>
                </a>
            </div>

                <div class="card-body">

                    <h3>Broj novih pitanja</h3>
                </div>

            </div>
        </div>
    </div>
<!--!new questions -->

<!--new users -->
    <div class="row justify-content-center">
        <div class="col-md-12 col-12">

            <div  class="card text-center">

                <div class="card-header"><a href="#"><h1>New users</h1></a></div>

                <div class="card-body">

                    <h3>broj novih korisnika</h3>
                </div>

            </div>
         </div>
    </div>
<!--!new users -->

<!--All users -->
    <div class="row justify-content-center">
        <div class="col-md-12 col-12">
            <div  class="card text-center">
                <div class="card-header"><a href="#"><h1>All users</h1></a></div>

                    <div class="card-body">

                        <h3>All users number</h3>
                    </div>

                </div>
        </div>
    </div>
<!-- !All users-->

<!-- All posts-->
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">
                <div  class="card text-center">
                    <div class="card-header"><a href="#"><h1>All posts</h1></a></div>

                        <div class="card-body">

                            <h3>All posts number</h3>
                        </div>

                    </div>
            </div>
            </div>
<!--!All posts -->

<!--New reports-->
            <div class="row justify-content-center">
                <div class="col-md-12 col-12">
                    <div  id="report" class="card text-center">
                        <div class="card-header"><a href="#"><h1>New Reports</h1></a></div>

                            <div class="card-body">

                                <h3>New Reports</h3>
                            </div>

                        </div>
                </div>
                </div>

<!--!New reports -->

</div>
@endsection
