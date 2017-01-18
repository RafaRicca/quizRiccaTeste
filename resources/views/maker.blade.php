@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
	            @if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
                <div class="panel-heading">Registre sua pergunta, responda e crie respostas falsas, {{ Auth::user()->name }}</div>
            	<div class="panel-body">
				{{ Form::open(array('action' => 'QuizMakerController@postQuestion','role' => 'form')) }}
				{{ Form::label('question', 'Pergunta', array('class'=>'control-label')) }}
				{{ Form::text('question', null, array('placeholder'=>'Sua pergunta', 'class'=>'form-control')) }}
				{{ Form::label('answer_correct', 'Resposta Correta', array('class'=>'control-label')) }}
				{{ Form::text('answer_correct', null, array('placeholder'=>'Resposta Correta', 'class'=>'form-control')) }}
				{{ Form::label('false_answer_1', 'Resposta Falsa 1', array('class'=>'control-label')) }}
				{{ Form::text('false_answer_1', null, array('placeholder'=>'Resposta Falsa 1', 'class'=>'form-control')) }}
				{{ Form::label('false_answer_2', 'Resposta Falsa 2', array('class'=>'control-label')) }}
				{{ Form::text('false_answer_2', null, array('placeholder'=>'Resposta Falsa 2', 'class'=>'form-control')) }}
				{{ Form::label('false_answer_3', 'Resposta Falsa 3', array('class'=>'control-label')) }}
				{{ Form::text('false_answer_3', null, array('placeholder'=>'Resposta Falsa 3', 'class'=>'form-control')) }}
				{{ Form::label('false_answer_4', 'Resposta Falsa 4', array('class'=>'control-label')) }}
				{{ Form::text('false_answer_4', null, array('placeholder'=>'Resposta Falsa 4', 'class'=>'form-control')) }}
				{{ Form::label('false_answer_5', 'Resposta Falsa 5', array('class'=>'control-label')) }}
				{{ Form::text('false_answer_5', null, array('placeholder'=>'Resposta Falsa 5', 'class'=>'form-control')) }}
				<br></br>
				{{ Form::submit('Registrar Pergunta', array('class' => 'btn btn-default')) }}
				{{ Form::close() }}
				</div>
        </div>
    </div>
</div>
</div>
@endsection

