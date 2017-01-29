@extends('layouts.app')

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 20px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

@section('content')
   <div class="container">
                    <center>
                        @if (Session::has('sucess'))
                            <div class="alert alert-success">
                                {{ session('sucess') }}
                            </div>
                        @elseif (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(!empty($questions))
                            <div class="title m-b-md">
                            <i>Quizzes</i> Disponíveis
                            </div>
                            <table class="table table-striped">
                            <tr>
                            <th width="33%">ID</th>
                            <th width="33%">Criador</th>
                            <th width="33%">Pergunta</th>
                            <th width="33%">Ação</th>
                            </tr>
                            @foreach($questions as $question)   
                                <tr>
                                <td>{{$question['Id']}}</td>
                                <td>{{$question['name']}}</td>
                                <td>{{$question['question']}}</td>
                                <td align="center"><a href="{{ url('list/'.$question['Id'].'/') }}">Responder</a></td>
                                </tr>
                            @endforeach
                            </table>
                        @else
                            <div class="title m-b-md">
                            Não há nenhum <i>Quiz</i> Disponível, faça um <a href="{{ url('/maker') }}">aqui</a>
                            </div>
                        @endif
                        <br>
                </center>
    </div>
@endsection