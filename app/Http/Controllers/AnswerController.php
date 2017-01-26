<?php

namespace QuizRiccaTeste\Http\Controllers;


use QuizRiccaTeste\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class AnswerController extends Controller
{
    //Mostrará as respostas disponíveis para o usuário.
    public function index($id)
    {
        //Questões Originais, para determinar a pergunta real.
        $question = Question::listQuestion($id);

        //Questões embaralhadas.
        $questionsMix = $this->mixAnswers($question);
        return view('answer', ['questionOriginal' => json_decode(json_encode($question), true),'questions' => $questionsMix]);
    }

    //Método para embaralhamento das respostas recebidas pelo BD.
    public function mixAnswers($question){
        $answers = json_decode(json_encode($question));
        $answer = array();
        $answer[0] = $answers->correct_answer;
        $answer[1] = $answers->false_answer_1;
        $answer[2] = $answers->false_answer_2;
        $answer[3] = $answers->false_answer_3;
        $answer[4] = $answers->false_answer_4;
        $answer[5] = $answers->false_answer_5;
        shuffle($answer);
        return $answer;
    }

    public function doAnswer($idteste){
        $id = Input::get("id");
        $answerOptionValue = Input::get('option');
        if(Question::checkAnswer(Auth::user()->id, $id, $answerOptionValue) == true){
            return redirect('home')->with('sucess', 'Resposta Correta!');
        } else {
            return redirect('home')->with('error', 'Resposta Incorreta!');
            /* Retorna para a view anterior com uma mensagem de erro*/
            //return redirect()->back(); 
        }
    }

}


