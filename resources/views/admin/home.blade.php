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
        <div class="col-md-3 col-12">
            <div  class="card text-center">
            <div class="card-header">
                <a href="{{ route('admin.question') }}">
                <h4> New questions</h4>
                </a>
            </div>

                <div class="card-body">

                    <h3>Broj novih pitanja</h3>
                </div>

            </div>
        </div>
        <div class="col-md-3 col-12">

            <div  class="card text-center">

                <div class="card-header"><a href="#"><h4>New users</h4></a></div>

                <div class="card-body">

                    <h3>broj novih korisnika</h3>
                </div>

            </div>
         </div>
         <div class="col-md-3 col-12">

            <div  class="card text-center">

                <div class="card-header"><a href="#"><h4>New Posts</h4></a></div>

                <div class="card-body">

                    <h3>broj novih objava</h3>
                </div>

            </div>
         </div>
         <div class="col-md-3 col-12">

            <div  class="card text-center">

                <div class="card-header"><a href="#"><h4>New News</h4></a></div>

                <div class="card-body">

                    <h3>broj novih obavestenja</h3>
                </div>

            </div>
         </div>
    </div>
<!--!new questions -->



<div class="row justify-content-center">
    <div class="col-md-3 col-12">
        <div  class="card text-center">
        <div class="card-header">
            <a href="{{ route('admin.question') }}">
            <h4>All questions</h4>
            </a>
        </div>

            <div class="card-body">

                <h3>All questions</h3>
            </div>

        </div>
    </div>
    <div class="col-md-3 col-12">

        <div  class="card text-center">

            <div class="card-header"><a href="#"><h4>All users</h4></a></div>

            <div class="card-body">

                <h3>All users</h3>
            </div>

        </div>
     </div>
     <div class="col-md-3 col-12">

        <div  class="card text-center">

            <div class="card-header"><a href="#"><h4>AllPosts</h4></a></div>

            <div class="card-body">

                <h3>All posts</h3>
            </div>

        </div>
     </div>

     <div class="col-md-3 col-12">

        <div  class="card text-center">

            <div class="card-header"><a href="#"><h4>All News</h4></a></div>

            <div class="card-body">

                <h3>All news</h3>
            </div>

        </div>
     </div>
</div>


<div class="row justify-content-center">
<div class="col-md-12 col-12">

    <div id="report" class="card text-center">

        <div class="card-header"><a href="#"><h4 >All Reports</h4></a></div>

        <div class="card-body">

            <h3>All Reports</h3>
        </div>

    </div>
 </div>
</div>





</div>
@endsection
