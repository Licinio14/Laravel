
@extends('layouts.fo_layout')

@section('content')

    @if (session('message'))
    <div class="container-fluid message-add-user-sucess text-center">
        <h3>{{session('message')}}</h3>
    </div>
    @endif

    <h1>As tarefas disponiveis sao: </h1>
    <br>
    <hr>

    {{-- pesquisa --}}

    <div class="container-fluid text-center">

        <form action="">
            <input type="text" id="search" name="search" value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-secondary">Procurar</button>
        </form>

    </div>
    <hr>

    <table class="table table-dark table-striped table-hover text-center">

        <tr>
            <td>Tarefa</td>
            <td>Estado</td>
            <td>Limite</td>
            <td>Pessoa Responsavel</td>
            <td></td>
        </tr>

        @foreach ( $data as $newData )

                <tr>
                    <td>{{ $newData->name}}</td>
                    <td>
                        @if ($newData->status == 0)
                            Por Fazer
                        @elseif ($newData->status == 1)
                            Concluido
                        @endif
                    </td>
                    <td>{{ $newData->due_at}}</td>
                    <td>{{ $newData->userName}}</td>
                    <td><a class="btn btn-info" href="{{ route('tasks.showone', $newData->id) }}">Ver</a>
                    <a class="btn btn-danger" href="{{ route('tasks.deleteone', $newData->id) }}">Apagar</a>
                    <a class="btn btn-info" href="{{ route('tasks.update', $newData->id) }}">Editar</a></td>
                </tr>

        @endforeach

    </table>

    <br>
    <hr>
    <br>
@endsection
