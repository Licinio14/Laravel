@extends('layouts.fo_layout')

@section('content')

    <br><hr>
    <h1>Criar conta</h1>
    <hr><br>

    <form method="POST" action="{{ route('users.create') }}" class="text-center" enctype="multipart/form-data">
        @csrf

        <fieldset>
            <legend>Nome: </legend>
            <input type="text" id="name" name="name" class="users-input-text-style"><br>
            @error('name')
                Nome invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Email: </legend>
            <input type="text" id="email" name="email" class="users-input-text-style"><br>
            @error('email')
                Email invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Password: </legend>
            <input type="password" id="password" name="password" class="users-input-text-style"><br>
            @error('password')
                Password invalida
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Imagem do album: </legend>
            <input type="file" accept="/image" id="photo" name="photo" class="users-input-text-style"><br>
            @error('photo')
                Foto invalida
            @enderror
        </fieldset>
        <br>
        <br><hr>
        <button type="submit" class="btn btn-primary">Submeter</button>

    </form>

@endsection
