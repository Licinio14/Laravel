
@extends('layouts.fo_layout')

@section('content')
    <h1>Editar tarefas</h1>
    <br><hr><br>

    <form method="POST" action="{{ route('tasks.create') }}" class="text-center">
        @csrf

        <fieldset>
            <input type="hidden" id="id" name="id" class="users-input-text-style" value="{{ $data->id }}"><br>
            @error('id')
                ID invalido
            @enderror
        </fieldset>

        <fieldset>
            <legend>Name: </legend>
            <input type="text" id="name" name="name" class="users-input-text-style" value="{{ $data->name }}"><br>
            @error('name')
                Nome invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Descrição: </legend>
            <input type="text" id="description" name="description" class="users-input-text-style" value="{{ $data->description }}"><br>
            @error('description')
                Descrição invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Data limite: </legend>
            <input type="date" id="due" name="due" class="users-input-text-style" value="{{ $data->due_at }}"><br>
            @error('due')
                Data invalida
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>ID da pessoa Responsavel: </legend>
            <select id="user_id" name="user_id" class="users-input-text-style">
                @foreach ($inf as $opcao)
                    <option value="{{ $opcao->id}}" @selected($opcao->id == $data->user_id)>{{ $opcao->name}}</option>
                @endforeach
            </select>
            @error('user_id')
                id invalido
            @enderror
        </fieldset>
        <br><hr>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


    <br><hr><br>

@endsection
