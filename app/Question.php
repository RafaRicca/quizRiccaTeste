<?php

namespace QuizRiccaTeste;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Question extends Model
{
	public $question;
	private $correctAnswer;
	private $falseAnswer1;
	private $falseAnswer2;
	private $falseAnswer3;
	private $falseAnswer4;
	private $falseAnswer5;

	//Inicializador da classe Question
	public function __construct($data){
		$this->setQuestions($data);
	}

	//Set todas a perguntas, a reposta correta e todas as respostas falsas.
	private function setQuestions($data){
		$this->question = $data['question'];
		$this->correctAnswer = $data['answer_correct'];
		$this->falseAnswer1 = $data['false_answer_1'];
		$this->falseAnswer2 = $data['false_answer_2'];
		$this->falseAnswer3 = $data['false_answer_3'];
		$this->falseAnswer4 = $data['false_answer_4'];
		$this->falseAnswer5 = $data['false_answer_5'];
	}

	public function insertQuestionDB($userId){
		//(id,user_id_question,question,correct_answer,false_answer_1,...,false_answer_5)
		DB::insert('insert into questions (Id, user_id_question,question, correct_answer, false_answer_1, false_answer_2,false_answer_3, false_answer_4, false_answer_5) values (?, ?, ?, ?, ?, ?, ?, ?, ? )', [NULL, $userId, $this->question, $this->correctAnswer, $this->falseAnswer1, $this->falseAnswer2, $this->falseAnswer3, $this->falseAnswer4, $this->falseAnswer5]);
	}

	public static function insertAnswerDB($userId, $id, $answer){
		DB::insert('insert into answers (Id, user_id_answer, question_id, answer) values (?, ?, ?, ? )', [NULL, $userId, $id, $answer]);
	}

	//Método estático para retorno do Nome da pessoa que fez a pergunta.
	public static function getNameById($id){
		$userName = DB::table('users')->where('name', $id)->first();
		return $userName;
	}

	//Método estático que retorna a pergunta com ID como parâmetro.
	public static function listQuestion($id){
		$questions = DB::table('questions')->where('Id', $id)->first();
		return $questions;
	}

	//Método estático que retorna uma lista com as perguntas com ID da pergunta e o ID de quem fez a pergunta.
	public static function listQuestions(){
		$questions = DB::select('Select Id, user_id_question from questions');
		return $questions;
	}

	//Método estático verifica se a resposta está correta.
	public static function checkAnswer($userId, $id, $answer){
		self::insertAnswerDB($userId, $id, $answer);
		$correctAnswer = DB::table('questions')->where('Id', $id)->first();
		if ($answer == $correctAnswer->correct_answer){
            return true;
		} else {
            return false;
		}
	}


}