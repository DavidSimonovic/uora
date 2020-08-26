<?php

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

Route::get('/register','Auth\RegisterController@show')->name('register');

Route::get('/home','HomeController@index')->name('home.index');

Route::get('/profil','ProfilController@index')->name('profil.index');

Route::get('/create','CreateController@index')->name('create.index');

Route::post('/create','CreateController@store')->name('create.store');

Route::get('/question','QuestionController@index')->name('question');

Route::get('/info','InfoController@index')->name('info');

Route::get('/news','NewsController@index')->name('news');
