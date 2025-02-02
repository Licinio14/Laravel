
@extends('layouts.fo_layout')

@section('content')

    <h1>As tarefas disponiveis sao: </h1>
    <br>
    <hr>
    <br>

    <table class="table table-dark table-striped table-hover text-center">

        <tr>
            <td>ID</td>
            <td>Tarefa</td>
            <td>Estado</td>
            <td>Limite</td>
            <td>Pessoa Responsavel</td>
        </tr>
        <tr>
            <td>{{ $data->id}}</td>
            <td>{{ $data->name}}</td>
            <td>
                @if ($data->status == 0)
                    Por Fazer
                @elseif ($data->status == 1)
                    Concluido
                @endif
            </td>
            <td>{{ $data->due_at}}</td>
            <td>{{ $data->userName}}</td>
        </tr>
    </table>

    <br>
    <hr>
    <br>
@endsection
