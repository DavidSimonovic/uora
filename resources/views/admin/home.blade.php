@extends('layouts.app')

@section('content')
<!-- NEW QUESTIONS -->
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-3 col-12">
            <div  class="card text-center">
            <div class="card-header">
                <a href="{{ route('admin.newquestions') }}">
                <h4>New questions</h4>
                </a>
            </div>

                <div class="card-body">

                    <h4>{{ $newQuestions }}</h4>
                </div>

            </div>
        </div>

    <!-- !NEW QUESTIONS -->

    <!-- NEW USERS -->
        <div class="col-md-3 col-12">

            <div  class="card text-center">

                <div class="card-header"><a href="{{ route('admin.newuser')}}"><h4>New users</h4></a></div>

                <div class="card-body">

                <h4>{{ $newUsers }}</h4>
                </div>

            </div>
         </div>

     <!-- NEW USERS -->

    <!-- NEW POSTS -->


         <div class="col-md-3 col-12">

            <div  class="card text-center">

                <div class="card-header"><a href="{{ route('admin.newposts')}}"><h4>New Posts</h4></a></div>

                <div class="card-body">



                <h4>{{ $newPosts }}</h4>

                </div>

            </div>
         </div>


    <!-- !NEW POSTS -->

    <!-- NEW NEWS -->
    <div class="col-md-3 col-12">

            <div  class="card text-center">

             <div class="card-header"><a href="{{ route('admin.newnews')}}"><h4>New News</h4></a></div>

                <div class="card-body">

                    <h4>{{ $newNews }}</h4>

                </div>

            </div>
         </div>
    </div>
    <!-- !NEW NEWS -->


<!-- ALL QUESTIONS -->
<div class="row justify-content-center">
    <div class="col-md-3 col-12">
        <div  class="card text-center">

            <div class="card-header">

                <a href="{{ route('admin.question') }}">

                    <h4>All questions</h4>

                </a>
        </div>

            <div class="card-body">

                <h4>{{ $allQuestions }}</h4>

            </div>

        </div>
    </div>
    <!-- !ALL QUESTIONS -->

    <!-- ALL USERS -->

    <div class="col-md-3 col-12">

        <div  class="card text-center">

        <div class="card-header"><a href="{{ route('admin.user')}}"><h4>All users</h4></a></div>

            <div class="card-body">

                <h4>{{ $allUsers }}</h4>
            </div>

        </div>
     </div>

     <!-- !ALL USERS -->

     <!-- ALL POSTS -->

     <div class="col-md-3 col-12">

        <div  class="card text-center">

        <div class="card-header"><a href="{{ route('admin.posts')}}"><h4>All Posts</h4></a></div>

            <div class="card-body">

                <h4>{{ $allPosts }}</h4>
            </div>

        </div>
     </div>
     <!-- !ALL POSTS -->

     <!-- ALL NEWS -->

     <div class="col-md-3 col-12">

        <div  class="card text-center">

        <div class="card-header"><a href="{{ route('admin.news')}}"><h4>All News</h4></a></div>

            <div class="card-body">

                <h4>{{ $allNews }}</h4>
            </div>

        </div>
     </div>
</div>

    <!-- !ALL NEWS -->

    <!-- HELPER QUESTIONS -->
<div class="row justify-content-center">
    <div class="col-md-6 col-12">

        <div  class="card text-center">

        <div class="card-header"><a href="{{ route('admin.newhelper')}}"><h4>New Helper Questions</h4></a></div>

            <div class="card-body">

                <h4>{{ $allNewHelperQuestions }}</h4>
            </div>

        </div>
     </div>

     <div class="col-md-6 col-12">

        <div  class="card text-center">

        <div class="card-header"><a href="{{ route('admin.helper')}}"><h4>All Helper Questions</h4></a></div>

            <div class="card-body">

                <h4>{{ $allHelperQuestions }}</h4>
            </div>

        </div>
     </div>
    </div>

    <!-- !HELPER QUESTIONS -->


    <!-- ALL REPORTS -->

<div class="row justify-content-center">
<div class="col-md-12 col-12">

    <div id="report" class="card text-center">

        <div class="card-header"><a href="{{ route('admin.reports')}}"><h4 >All Reports</h4></a></div>

        <div class="card-body">

        <h4>{{ $allReports }}</h4>
        </div>

    </div>
 </div>
</div>

<!-- !ALL REPORTS -->

</div>
@endsection
