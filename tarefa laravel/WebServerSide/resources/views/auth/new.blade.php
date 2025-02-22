@extends('layouts.fo_layout')

@section('content')

    <br><hr>
    <h1>Login</h1>
    <hr><br>

    <div class="container text-center">
        <form method="POST" action="{{route('password.update')}}">
            @csrf
            <fieldset>
                <legend>Email: </legend>
                <input type="text" id="email" name="email" value="{{ request()->email }}" class="users-input-text-style" readonly style="background-color: rgb(182, 182, 182)"><br>
            </fieldset>
            <br>
            <fieldset>
                <legend>Password: </legend>
                <input type="password" id="password" name="password" @error('password') is-invalid @enderror class="users-input-text-style"><br>
                @error('password')
                    Password Invalida
                @enderror
            </fieldset>
            <br>
            <fieldset>
                <legend>Password: </legend>
                <input type="password" id="password_confirmation" name="password_confirmation" class="users-input-text-style"><br>
            </fieldset>
            <br><hr>
            <input type="hidden" name="token" id="" value="{{ request()->route('token') }}">
            <button type="submit" class="btn btn-primary">Submeter</button>
            <br><br>
        </form>
    </div>



@endsection
