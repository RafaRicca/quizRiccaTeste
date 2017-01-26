<?php

namespace QuizRiccaTeste\Http\Controllers;

use QuizRiccaTeste\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Question::listQuestions();
       // echo $resultArray[0]["user_id_question"];
        return view('/home', ['questions' => json_decode(json_encode($question), true)]);
        //return view('home');
    }
}
