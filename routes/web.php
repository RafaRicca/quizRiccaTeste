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


//Poderia fazer um grupo de rotas que funcionariam através de uma única middleware
// Route::group(['middleware' => 'terms'], function(){});
//Get/Post do registro de perguntas
Route::get('maker', ['as' => 'maker', 'uses' => 'QuizMakerController@index']);
Route::post('postQuestion', ['middleware' => 'terms','as' => 'postQuestion', 'uses' => 'QuizMakerController@postQuestion']);

Route::get('list/{id}', ['as' => 'list', 'uses' => 'AnswerController@index']);
Route::post('list/{idteste}', ['as' => 'postQuiz', 'uses' => 'AnswerController@doAnswer']);



/*

Route::get('user/profile', [
    'as' => 'profile', 'uses' => 'UserController@showProfile'
]);*/