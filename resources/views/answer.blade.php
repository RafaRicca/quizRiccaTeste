@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Marque a resposta que você considere a correta, {{ Auth::user()->name }}</div>
            	<div class="panel-body">
                Pergunta: {{$questionOriginal['question']}}
                {{ Form::open(array('route' => array('postQuiz', $questionOriginal['Id']))) }}
				<input type="hidden" name="id" value="{{$questionOriginal['Id']}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="radio" name="option" value="{{$questions[0]}}">{{$questions[0]}}</input>
				<br>	
				<input type="radio" name="option" value="{{$questions[1]}}">{{$questions[1]}}</input>
				<br>	
				<input type="radio" name="option" value="{{$questions[2]}}">{{$questions[2]}}</input>
				<br>	
				<input type="radio" name="option" value="{{$questions[3]}}">{{$questions[3]}}</input>
				<br>	
				<input type="radio" name="option" value="{{$questions[4]}}">{{$questions[4]}}</input>
				<br>
				<input type="radio" name="option" value="{{$questions[5]}}">{{$questions[5]}}</input>
				<br></br>
				{{ Form::submit('Responder', array('class' => 'btn btn-default')) }}
				</form>
				</div>
        </div>
    </div>
</div>
</div>
@endsection

