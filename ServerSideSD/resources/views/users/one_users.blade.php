
@extends('layouts.fo_layout')

@section('content')

    <h1>Informações sobre {{ $userInfo->name }}</h1>

    <hr><hr>
    <table class="table table-dark table-striped table-hover text-center">

        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>NIF</td>
            <td>Email</td>
            <td>Address</td>
            <td>Foto</td>
        </tr>
        <tr>
            <td>{{ $userInfo->id}}</td>
            <td>{{ $userInfo->name}}</td>
            <td>{{ $userInfo->nif}}</td>
            <td>{{ $userInfo->email}}</td>
            <td>{{ $userInfo->address}}</td>
            <td><img width="50px" height="50px" src="{{ $userInfo->photo ? asset('storage/' . $userInfo->photo ) : asset('img/noimage.png')}}"> </td>
            {{-- <td><a class="btn btn-info" href="{{ route('users.showone', $array->id) }}">Ver</a></td> --}}
        </tr>

    </table>
    <hr><hr>


@endsection
