@extends('layouts.fo_layout')

@section('content')

    <br><hr><br>

    <div class="container-fluid text-center">

        <img src="{{asset('img/perdido.avif')}}" alt="imagem de pessoa perdida">
        <h1>Estas perdido?</h1>
        <a href="{{ route('home')}}"><h3>Esperimenta clicar aqui.</h3></a>

    </div>


@endsection
