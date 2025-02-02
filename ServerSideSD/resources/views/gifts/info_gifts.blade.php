@extends('layouts.fo_layout')

@section('content')
    {{-- $data --}}

    <h1>Informação da prenda: </h1>
    <br>

    <table class="table table-dark table-striped table-hover text-center">

        <tr>
            <td>Nome</td>
            <td>Valor previsto</td>
            <td>Pessoa de Destino</td>
            <td>Valor pago</td>
        </tr>

        @foreach ($data as $newData)
            <tr>
                <td>{{ $newData->name }}</td>
                <td>{{ $newData->price }}</td>
                <td>{{ $newData->userName }}</td>
                <td>{{ $newData->costs }}</td>
            </tr>
        @endforeach

    </table>
@endsection
