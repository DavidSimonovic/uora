<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
/* Rute for showing the ArthritisTYpe */

Route::get('/register','Auth\RegisterController@show')->name('register');

/* Dislpaying all posts,questions,news */

Route::get('/home','HomeController@index')->name('home.index');

/* Profil route will show all your posts,questions and personal info */

Route::get('/profil','ProfilController@index')->name('profil.index');

/* this route is to display the input fields and dropdown options */

Route::get('/create','CreateController@index')->name('create.index');

/* this route is for saving the post */

Route::post('/create','CreateController@create')->name('create.create');

/* showing the full post with comments */

Route::get('/fullpost/{id}','PostController@show');

/* showing full questioon with comment */

Route::get('/fullquestion/{id}','QuestionController@show');

/* showing only questions */

Route::get('/question','QuestionController@index')->name('question');

/* removing question */

Route::post('/removequestion/{id}/','QuestionController@destroy');
/* showing only posts */

Route::get('/posts','PostController@index')->name('posts');

/* showing only news */

Route::get('/news','NewsController@index')->name('news');

/* remove news/ only heper can remove new */

Route::post('/removenews/{id}/','NewsController@destroy');

/* remove answer from question */

Route::post('/removeanswer/{id}/{ansid}','AnswerController@destroy');

/* removing the comment on a post */


Route::post('/removepostcomment/{id}/{postcomid}','PostCommentController@destroy');

/* removing the post compleatly */


Route::post('/removepost/{id}/','PostController@destroy');

/* saving the comment on a post  */

Route::post('/fullpost/{id}','PostCommentController@store');

/* full news page */

Route::get('/fullnews/{id}','NewsController@show');

/* saving the comment on news */

Route::post('/fullnews/{id}','NewsCommentController@store');

/* removing news comment */

Route::post('/removenewscomment/{id}/{newscomid}','NewsCommentController@destroy');

/* saving post question comment */

Route::post('/fullquestion/{id}','AnswerController@store');

/* adming/helper home panel */

Route::get('/admin','AdminController@index')->name('admin.index');

/* adming/helper  questions panel */

Route::get('/admin/questions','AdminQuestionController@index')->name('admin.question');

/* adming/helper  user panel */

Route::get('/admin/user','AdminUserController@index')->name('admin.user');


Route::get('/admin/posts','AdminPostController@index')->name('admin.posts');


Route::get('/admin/news','AdminNewsController@index')->name('admin.news');

/* adming/helper reported panel */

Route::get('/admin/reported','AdminReportController@index')->name('admin.reported');


Route::get('/admin/new/news', 'AdminNewNewsController@index')->name('admin.newnews');


Route::get('/admin/new/posts', 'AdminNewPostController@index')->name('admin.newposts');

Route::get('admin/new/questions', 'AdminNewQuestionController@index')->name('admin.newquestions');


Route::get('/admin/new/users', 'AdminNewUserController@index')->name('admin.newuser');

Route::post('/removeuser/{id}', "AdminNewUserController@destroy");

Route::get('profil/{id}','ProfilController@index');


Route::post('/aprove/newuser/{id}','AdminNewUserController@update');

Route::post('/aprove/newquestion/{id}','AdminNewQuestionController@update');

Route::post('/aprove/newpost/{id}','AdminNewPostController@update');

Route::post('/aprove/newnews/{id}','AdminNewNewsController@update');

Route::post('/serach','SearchController@search')->name('search');
