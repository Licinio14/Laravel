
@extends('layouts.fo_layout')

@section('content')

    @if (session('message'))
    <div class="container-fluid message-add-user-sucess text-center">
        <h3>{{session('message')}}</h3>
    </div>
    @endif

    <br>

    <h1>Aqui vês todas as bandas</h1>

    <br><hr><hr>


    {{-- pesquisa --}}

    <div class="container-fluid text-center">

    <form action="">
        <input type="text" id="search" name="search" value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Procurar</button>
    </form>

    </div>





    <hr><hr><br>
    <table class="table table-dark table-striped table-hover text-center">

    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Banda</td>
        <td>Data Lançamento</td>
        <td>Foto</td>
        <td></td>
    </tr>

    @foreach ($BandInfo as $array)

            <tr>
                <td>{{ $array->id}}</td>
                <td>{{ $array->name}}</td>
                <td>{{ $array->id_banda}}</td>
                <td>{{ $array->date}}</td>
                <td><img width="50px" height="50px" src="{{ $array->photo ? asset('storage/' . $array->photo ) : asset('img/noimage.png')}}"> </td>
                <td>{{-- <a class="btn btn-danger" href="{{ route('users.update', $array->id) }}">Modificar</a> --}}
                    @auth
                        @if (Auth::user()->user_type == 1)
                            {{--<a class="btn btn-danger" href="{{ route('users.deleteOne', $array->id) }}">Apagar</a>--}}
                        @endif
                    @endauth
                </td>
            </tr>

    @endforeach

    </table>
    <br><hr><hr><br>

    


@endsection
