<?php

use App\Http\Controllers\HomeController;
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
/* Auth */

Route::get('/register','Auth\RegisterController@show')->name('register');

/* !Auth */

/* --------------------------------------------------------------------- */

/* ADMIN ROUTS */

Route::get('/admin','AdminController@index')->name('admin.index');

Route::post('/ban/{id}','AdminUserController@update');

Route::post('/removehelperquestion/{id}','AdminHelperQuestionController@destroy');

Route::post('/answered/{id}','AdminHelperQuestionController@update');

Route::get('/admin/helper/','AdminHelperQuestionController@index')->name('admin.helper');

Route::get('/admin/new/helper/','AdminNewHelperQuestionController@index')->name('admin.newhelper');

Route::get('/admin/new/posts', 'AdminNewPostController@index')->name('admin.newposts');

Route::get('/admin/new/questions', 'AdminNewQuestionController@index')->name('admin.newquestions');

Route::get('/helper/full/{id}','AdminHelperQuestionController@show');

Route::get('/admin/new/users', 'AdminNewUserController@index')->name('admin.newuser');

Route::post('/removequestionanswer/{id}','AdminHelperController@destroy');

Route::post('/hold/{id}','AdminPostController@update');

Route::post('/aprove/newquestion/{id}','AdminNewQuestionController@update');

Route::post('/aprove/newpost/{id}','AdminNewPostController@update');

Route::post('/aprove/newnews/{id}','AdminNewNewsController@update');

Route::get('/admin/questions','AdminQuestionController@index')->name('admin.question');

Route::get('/admin/user','AdminUserController@index')->name('admin.user');

Route::get('/admin/posts','AdminPostController@index')->name('admin.posts');

Route::get('/admin/news','AdminNewsController@index')->name('admin.news');

Route::get('/admin/reported','AdminReportController@index')->name('admin.reports');

Route::get('/admin/new/news', 'AdminNewNewsController@index')->name('admin.newnews');

Route::post('/aprove/new/news/{id}', 'AdminNewNewsController@update');

Route::post('/aprove/{id}','AdminNewQuestionController@update');


/* ADMIN ROUTS */


/* --------------------------------------------------------------------- */


/* NEWS */

Route::get('/fullnews/{id}','NewsController@show');

/* saving the comment on news */

Route::post('/fullnews/{id}','NewsCommentController@store');

/* removing news comment */

Route::post('/removenewscomment/{id}/{newscomid}','NewsCommentController@destroy');

/* showing only news */

Route::get('/news','NewsController@index')->name('news');

/* remove news/ only heper can remove new */

Route::post('/removenews/{id}/','NewsController@destroy');


/* !NEWS */

/* --------------------------------------------------------------------- */

/* REPORT */

Route::get('/report/{type}/{id}','ReportController@index');

Route::post('/reported/{type}/{id}','ReportController@store');

Route::post('/dissmis/{id}','ReportController@update');

/* !REPORT */

/* --------------------------------------------------------------------- */

/* Create */

Route::get('/create','CreateController@index')->name('create.index');

Route::post('/create','CreateController@create')->name('create.create');

/* !Create */

/* --------------------------------------------------------------------- */

/* Profil */

Route::get('/profil','ProfilController@index')->name('profil.index');

Route::get('/profil/{id}','ProfilController@show');

Route::post('/profil/edit','ProfilController@edit')->name('profil.edit');


/* !Profil */

/* --------------------------------------------------------------------- */

/* Search */

Route::post('/serach','SearchController@search')->name('search');

/* !Search */

/* --------------------------------------------------------------------- */

/* Post */

Route::get('/posts','PostController@index')->name('posts');

Route::get('/fullpost/{id}','PostController@show');

Route::post('/removepost/{id}/','PostController@destroy');

Route::post('/fullpost/{id}','PostCommentController@store');

Route::post('/removepostcomment/{id}/{postcomid}','PostCommentController@destroy');

/* !Post */

/* --------------------------------------------------------------------- */

/* Question */

Route::get('/fullquestion/{id}','QuestionController@show');

Route::get('/question','QuestionController@index')->name('question');

Route::post('/removequestion/{id}/','QuestionController@destroy');

/* !Question */

/* --------------------------------------------------------------------- */

/* Helper */

Route::post('/removehelperanswer/{id}/{ansid}','HelperAnswerController@destroy');

Route::post('/helper/full/{id}','HelperAnswerController@store');

/* !Helper */

/* --------------------------------------------------------------------- */

/* Answer */

Route::post('/removeanswer/{id}/{ansid}','AnswerController@destroy');

Route::post('/fullquestion/{id}','AnswerController@store');

/* !Answer */

/* --------------------------------------------------------------------- */

/* User */

Route::post('/removeuser/{id}', 'UserController@destroy');

Route::post('/aprove/newuser/{id}','UserController@update');

/* !User */

/* --------------------------------------------------------------------- */

/* Category */

Route::get('/category/','CategoryController@index');

/* !Category */


/* --------------------------------------------------------------------- */

/* Home */

Route::get('/home','HomeController@index')->name('home.index');

/* !Home */
