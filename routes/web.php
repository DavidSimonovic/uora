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

/* showinf the full post with comments */

Route::get('/fullpost/{id}','PostController@show');


Route::get('/fullquestion/{id}','QuestionController@show');

/* showing only questions */

Route::get('/question','QuestionController@index')->name('question');

Route::post('/removequestion/{id}/','QuestionController@destroy');
/* showing only posts */

Route::get('/posts','PostController@index')->name('posts');

/* showing only news */

Route::get('/news','NewsController@index')->name('news');

Route::post('/removenews/{id}/','NewsController@destroy');

Route::post('/removeanswer/{id}/{ansid}','AnswerController@destroy');


Route::post('/removepostcomment/{id}/{postcomid}','PostCommentController@destroy');

Route::post('/removepost/{id}/','PostController@destroy');


Route::post('/fullpost/{id}','PostCommentController@store');


Route::get('/fullnews/{id}','NewsController@show');


Route::post('/fullnews/{id}','NewsCommentController@store');

Route::post('/removenewscomment/{id}/{newscomid}','NewsCommentController@destroy');

Route::post('/fullquestion/{id}','AnswerController@store');

/* adming/helper home panel */

Route::get('/admin','AdminController@index')->name('admin.index');

/* adming/helper  questions panel */

Route::get('/admin/questions','AdminQuestionController@index')->name('admin.question');

/* adming/helper  user panel */

Route::get('/admin/user','AdminUserController@index')->name('admin.user');

/* adming/helper reported panel */

Route::get('/admin/reported','AdminReportController@index')->name('admin.reported');



