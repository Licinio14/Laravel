
@extends('layouts.fo_layout')

@section('content')
    <h1>Inserir users</h1>
    <br><hr><br>

    <form method="POST" action="{{ route('users.create') }}" class="text-center">
        @csrf

        <fieldset>
            <legend>Name: </legend>
            <input type="text" placeholder="Utilizador" id="name" name="name" class="users-input-text-style"><br>
            @error('name')
                Nome invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Email: </legend>
            <input type="text" placeholder="Utilizador" id="email" name="email" class="users-input-text-style"><br>
            @error('email')
                Email invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Password: </legend>
            <input type="text" placeholder="Utilizador" id="pd" name="pd" class="users-input-text-style"><br>
            @error('pd')
                Password invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Address : </legend>
            <input type="text" placeholder="Utilizador" id="address" name="address" class="users-input-text-style"><br>
            @error('address')
                Address invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="cbox">
            <label class="form-check-label" for="exampleCheck1">Aceitar termos</label>
            @error('cbox')
                Precisa aceitar os termos
            @enderror
        </fieldset>
        <br><hr>
        <button type="submit" class="btn btn-primary">Send Form</button>

    </form>


    <br><hr><br>








@endsection
