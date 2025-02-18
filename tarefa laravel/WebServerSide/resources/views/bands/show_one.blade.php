
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
                <td><a class="btn btn-danger" href="{{ route('albuns.edit', $array->id) }}">Modificar</a>
                    {{-- @auth
                        @if (Auth::user()->user_type == 1) --}}
                            <a class="btn btn-danger" href="{{ route('albuns.delete', $array->id) }}">Apagar</a>
                        {{-- @endif
                    @endauth --}}
                </td>
            </tr>

    @endforeach

    </table>
    <br><hr><hr><br>

    {{-- @auth --}}
    <div class="container-fluid text-center">
        <h1>Adicionar nova banda</h1>
        <img src="{{asset('img/new.png')}}" alt="imagem: nova prenda" class="img-gifts-add" style="cursor: pointer;" onclick="Show()">

    </div>
{{-- @endauth --}}

<hr><hr><br>

@if (isset($edit))
    <script>
        window.onload = function() {
            Show();
        };
    </script>
@endif


{{-- formulario para criar prendas --}}
<div class="modal modal-add-gifts" id="addGifts">
    <div class="modal-content" id="formAddGifts">
        <form method="POST" action="{{ route('albuns.create') }}" class="text-center" enctype="multipart/form-data">
            @csrf

            <h1 class="merriweather-regular">Adicionar novo album</h1>

            <hr>
            <fieldset>
                <input type="hidden" id="id" name="id" value="{{ isset($edit) ? $edit->id : null; }}" class="users-input-text-style"><br>
            </fieldset>
            <fieldset>
                <legend>Nome do album: </legend>
                <input type="text" id="name" name="name" value="{{ isset($edit) ? $edit->name : null; }}" class="users-input-text-style"><br>
                @error('name')
                    Nome invalido
                @enderror
            </fieldset>
            <br>
            <fieldset>
                <legend>Banda: </legend>
                <select id="id_banda" name="id_banda" class="users-input-text-style">
                    @foreach ($bandas as $opcao)
                        <option value="{{ $opcao->id}}">{{ $opcao->name}}</option>
                    @endforeach
                </select>
                @error('id_banda')
                    Banda invalida
                @enderror
            </fieldset>
            <br>
            <fieldset>
                <legend>Data de lançamento: </legend>
                <input type="date" id="date" name="date" value="{{ isset($edit) ? $edit->quant_albuns : 0; }}" class="users-input-text-style"><br>
                @error('data')
                    Data invalida
                @enderror
            </fieldset>
            <br>
            <fieldset>
                <legend>Imagem do album: </legend>
                <img src="{{ isset($edit) && $edit->photo != "" ? asset('storage/' . $edit->photo ) : asset('img/noimage.png') }}" width="50px" height="50px"><br><br>
                <input type="file" accept="/image" id="photo" name="photo" class="users-input-text-style"><br>
                @error('photo')
                    Foto invalida
                @enderror
            </fieldset>
            <br>
            <br><hr>
            <button type="submit" class="btn btn-primary">Submeter</button>

        </form>
    </div>
</div>


<script src={{asset('js/script.js')}}></script>


@endsection
