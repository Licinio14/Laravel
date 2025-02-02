
@extends('layouts.fo_layout')

@section('content')
    <br>
    <hr>
    <br>
    <h1>Tarefas atribuidas</h1>
    <br>
    @foreach ( $tasks as $showtask )
        <ul>
            <li>{{ $showtask['name'] }} tem a tarefa de {{ $showtask['task'] }}</li>
        </ul>
    @endforeach
    <br>
    <hr>
    <br>
    <h1>As tarefas disponiveis sao: </h1>
    <br>
    @foreach ( $availableTasks as $available)
        <ul>
            <li>{{ $available }}</li>
        </ul>
    @endforeach
    <br>
    <hr>
    <br>
@endsection
