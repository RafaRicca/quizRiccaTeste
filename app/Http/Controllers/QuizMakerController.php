<?php

namespace QuizRiccaTeste\Http\Controllers;


use QuizRiccaTeste\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class QuizMakerController extends Controller
{

    public function index()
    {
        return view('maker');
    }

    //Método post do formulário do Quiz, pegará todas as informações que foram inseridas.
    public function postQuestion(){
        $rules = array( 'question' => 'required', 'answer_correct' => 'required', 'false_answer_1' => 'required', 'false_answer_2' => 'required', 'false_answer_3' => 'required', 'false_answer_4' => 'required', 'false_answer_5' => 'required' );
        $validation = Validator::make(Input::all(), $rules);
        $data = array();
        $data['question'] = Input::get("question");
        $data['answer_correct'] = Input::get("answer_correct");
        $data['false_answer_1'] = Input::get("false_answer_1");
        $data['false_answer_2'] = Input::get("false_answer_2");
        $data['false_answer_3'] = Input::get("false_answer_3");
        $data['false_answer_4'] = Input::get("false_answer_4");
        $data['false_answer_5'] = Input::get("false_answer_5");
        
        //Se todos as regras forem atendidas.
        if($validation->passes()){
            //Um método estático com a função de inserir no BD acredito que seria a melhor opção, mas foi criado uma modelo padrão para ser instanciada.
            //Question::insertQuestionDB($data, Auth::user()->id);
            $question = new Question($data);
            $question->insertQuestionDB(Auth::user()->id);
            return redirect()->route('home');
        } else {
            return "Algo está errado";
        }

    }
}