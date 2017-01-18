@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <center><a href="{{ url('/maker') }}">Criar Quiz</a>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <i>Quizzes</i> Disponíveis
                    <br>
                    @if(!empty($questions))
                        <table style="width:50%">
                        <tr>
                        <td>ID</td>
                        <td>ID Criador</td>
                        <td>Ação</td>
                        @foreach($questions as $question)   
                            <tr>
                            <td>{{$question['Id']}}</td>
                            <td>{{$question['user_id_question']}}</td>
                            <td><a href="{{ url('quiz/'.$question['Id'].'/') }}">Responder Quiz</a></td>
                            </tr>
                        @endforeach
                        </table>
                    @endif
                    <br>
</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</a>