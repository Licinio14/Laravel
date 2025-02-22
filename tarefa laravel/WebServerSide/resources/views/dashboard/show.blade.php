
@extends('layouts.fo_layout')

@section('content')

    @if (session('message'))
        <br><hr><br>

        <div class="container-fluid message-add-user-sucess text-center">
            <h3>{{session('message')}}</h3>
        </div>

        <br><hr><br>
    @endif

    <div class="container-fluid">
        <hr>
        <h1 class="merriweather-regular text-center">Bem-vindo a melhor database de bandas</h1>
        <hr>

        <img src="{{asset('img/baner.jpg')}}" style="width: 100%; height: 400px;border-radius: 20px;">

        <br>
        <hr>
        <br>

        

        <br>
        <hr>
        <br>


    </div>

</h1>


@endsection
