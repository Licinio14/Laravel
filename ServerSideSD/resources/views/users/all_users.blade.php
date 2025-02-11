
@extends('layouts.fo_layout')

@section('content')

    @if (session('message'))
        <div class="container-fluid message-add-user-sucess text-center">
            <h3>{{session('message')}}</h3>
        </div>
    @endif

    <h1>Aqui vês todos os users</h1>

    <hr><hr>
    <p>Name: {{ $contactPerson->name}}</p>
    <p>Address: {{ $contactPerson->address}}</p>
    <p>Email: {{ $contactPerson->email}}</p>
    <hr><hr>

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
            <td>Name</td>
            <td>Email</td>
            <td>Photo</td>
            <td></td>
        </tr>

        @foreach ($userInfo as $array)

                <tr>
                    <td>{{ $array->id}}</td>
                    <td>{{ $array->name}}</td>
                    <td>{{ $array->email}}</td>
                    <td><img width="50px" height="50px" src="{{ $array->photo ? asset('storage/' . $array->photo ) : asset('img/noimage.png')}}"> </td>
                    <td><a class="btn btn-info" href="{{ route('users.showone', $array->id) }}">Ver</a>
                    <a class="btn btn-danger" href="{{ route('users.update', $array->id) }}">Modificar</a>
                        @auth
                            @if (Auth::user()->email == 'admin@gmail.com')
                                <a class="btn btn-danger" href="{{ route('users.deleteOne', $array->id) }}">Apagar</a>
                            @endif
                        @endauth
                    </td>
                </tr>

        @endforeach

    </table>
    <br><hr><hr><br>


@endsection
