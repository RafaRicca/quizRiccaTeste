<?php

namespace QuizRicca\Http\Controllers;

use QuizRicca\Question;
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
        /*$person = '{"name":"Diogo Matheus","age":23}';
        //dd(json_decode($person), true);
        $question = Question::listQuestions();
        //Objeto STDClass
        var_dump($question[0]);
        echo "<br></br>";

        //Json a partir do Json_encode
        $questionfirst = json_encode($question);
        var_dump($questionfirst);
        echo "<br></br>";

        //Array apartir do Json
        $questionnovo = json_decode($questionfirst, true);
        var_dump($questionnovo[0]["Id"]);
       // echo $resultArray[0]["user_id_question"];
       */
        echo (Question::doSomethingWeirdo());
        $question = Question::listQuestions();
        return view('/home', ['questions' => json_decode(json_encode($question), true)]);
        //return view('home');
    }
}

/* Array de objetos Json
[
   {
     “titulo”: “JSON x XML”,
     “resumo”: “o duelo de dois modelos de representação de informações”,
     “ano”: 2012,
     “genero”: [“aventura”, “ação”, “ficção”]   
    },
   {
     “titulo”: “JSON James”,
     “resumo”: “a história de uma lenda do velho oeste”,
     “ano”: 2012,
     “genero”: [“western”]  
    }
]

*/