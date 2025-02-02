
@extends('layouts.fo_layout')

@section('content')
    <h1>Update Users</h1>
    <br><hr><br>

    <form method="POST" action="{{ route('users.updateInfo') }}" class="text-center">
        @csrf

        <fieldset style="display: none">
            <legend>Id: </legend>
            <input type="text" placeholder="Utilizador" id="id" name="id" value="{{$inf->id}}" class="users-input-text-style" readonly style="background-color: lightgray"><br>

        </fieldset>
        <fieldset>
            <legend>Name: </legend>
            <input type="text" placeholder="Utilizador" id="name" name="name" value="{{$inf->name}}" class="users-input-text-style"><br>
            @error('name')
                Nome invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Email: </legend>
            <input type="text" placeholder="Utilizador" id="email" name="email" value="{{$inf->email}}" class="users-input-text-style"><br>
            @error('email')
                Email invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Address : </legend>
            <input type="text" placeholder="Utilizador" id="address" name="address" value="{{$inf->address}}" class="users-input-text-style"><br>
            @error('address')
                Address invalido
            @enderror
        </fieldset>
        <br><hr>
        <button type="submit" class="btn btn-primary">Send Form</button>
        @error('id')
            <br>
            Ocurreu um erro inesperado!
        @enderror

    </form>


    <br><hr><br>

@endsection
