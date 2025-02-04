@extends('layouts.fo_layout')

@section('content')

    @auth
        @if (Auth::user()->user_type == 1)
            <div class="alert alert-info" role="alert">
                Bem-Vindo Administrador!

                <script>function eAdmin(){

                    alert("Bem-vindo Admin")
                } eAdmin()</script>

            </div>
        @endif
    @endauth

    <br><hr><br>

    <h1>Olá @auth
        {{ Auth::user()->name}}
    @else
        User
    @endauth
    </h1>

    <br><hr><br>


@endsection
