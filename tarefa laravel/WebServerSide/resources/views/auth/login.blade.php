@extends('layouts.fo_layout')

@section('content')

    <br><hr>
    <h1>Login</h1>
    <hr><br>

    <div class="container text-center">
        <form method="POST" action="{{route('login')}}">
            @csrf

            @error('email')

                <div >
                        <h3 style="background-color: red; border-radius: 10px;" class="text-center">Credenciais Erradas</h3>
                    <br>
                </div>

            @enderror

            <fieldset>
                <legend>Email: </legend>
                <input type="text" id="email" name="email" class="users-input-text-style"><br>

            </fieldset>
            <br>
            <fieldset>
                <legend>Password: </legend>
                <input type="password" id="password" name="password" class="users-input-text-style"><br>
                @error('password')
                    Password invalida
                @enderror
            </fieldset>
            <br><hr>
            <button type="submit" class="btn btn-primary">Submeter</button>
            <br><br>
            <a href="{{ route('password.request')}}">Esqueci-me da password</a>
        </form>
    </div>



@endsection
