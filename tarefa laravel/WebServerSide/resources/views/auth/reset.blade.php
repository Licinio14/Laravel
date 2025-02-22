@extends('layouts.fo_layout')

@section('content')

    <br><hr>
    @if (@session('status'))
        <div class="alert alert-sucess">Iremos enviar um email para recuperação da password</div>
    @endif

    <br><hr>
    <h1>Recuperar Pass</h1>
    <hr><br>

    <div class="container text-center">
        <form method="POST" action="{{route('password.email')}}">
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
            <br><hr>
            <button type="submit" class="btn btn-primary">Submeter</button>
            <br><br>
        </form>
    </div>



@endsection
