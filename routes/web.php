<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

//Get/Post do registro de perguntas
Route::get('maker', 'QuizMakerController@index');
Route::post('maker', 'QuizMakerController@postQuestion');

Route::get('quiz/{id}', 'AnswerController@index');
Route::post('quiz/{questionid}', ['as' => 'test', 'uses' => 'AnswerController@postAnswer']);

/*

Route::get('user/profile', [
    'as' => 'profile', 'uses' => 'UserController@showProfile'
]);*/