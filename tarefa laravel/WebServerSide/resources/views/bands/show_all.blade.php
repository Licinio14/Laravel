
@extends('layouts.fo_layout')

@section('content')

    @if (session('message'))
    <div class="container-fluid message-add-user-sucess text-center">
        <h3>{{session('message')}}</h3>
    </div>
    @endif

    <br>

    <h1 class="merriweather-regular">Aqui vês todas as bandas</h1>

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
        <td>Albuns Lançados</td>
        <td>Foto</td>
        <td></td>
    </tr>

    @foreach ($BandInfo as $array)

            <tr>
                <td>{{ $array->id}}</td>
                <td>{{ $array->name}}</td>
                <td>{{ $array->quant_albuns}}</td>
                <td><img width="50px" height="50px" src="{{ $array->photo ? asset('storage/' . $array->photo ) : asset('img/noimage.png')}}"> </td>
                <td><a class="btn btn-info" href="{{ route('bands.show_one', $array->id) }}">Ver Albuns</a>
                <a class="btn btn-danger" href="{{ route('bands.delete', $array->id) }}">Apagar Banda</a>
                    @auth
                        @if (Auth::user()->user_type == 1)
                            {{-- <a class="btn btn-danger" href="{{ route('users.deleteOne', $array->id) }}">Apagar</a> --}}
                        @endif
                    @endauth
                </td>
            </tr>

    @endforeach

    </table>

    <br><hr><hr>

    {{-- @auth --}}
        <div class="container-fluid text-center">
            <h1>Adicionar nova banda</h1>
            <img src="{{asset('img/new.png')}}" alt="imagem: nova prenda" class="img-gifts-add" style="cursor: pointer;" onclick="Show()">
        </div>
    {{-- @endauth --}}

    <hr><hr><br>


    {{-- formulario para criar prendas --}}
    <div class="modal modal-add-gifts" id="addGifts">
        <div class="modal-content" id="formAddGifts">
            <form method="POST" action="{{ route('bands.create') }}" class="text-center" enctype="multipart/form-data">
                @csrf

                <h1 class="merriweather-regular">Adicionar nova banda</h1>

                <hr>

                <fieldset>
                    <legend>Nome da banda: </legend>
                    <input type="text" id="name" name="name" class="users-input-text-style"><br>
                    @error('name')
                        Nome invalido
                    @enderror
                </fieldset>
                <br>
                <fieldset>
                    <legend>Quantidade de albuns: </legend>
                    <input type="number" id="quant_albuns" name="quant_albuns" class="users-input-text-style" step="1" min="0"><br>
                    @error('quant_albuns')
                        Quantidade invalida
                    @enderror
                </fieldset>
                <br>
                <fieldset>
                    <legend>Imagem da banda: </legend>
                    <input type="file" accept="/image" id="photo" name="photo" class="users-input-text-style"><br>
                    @error('photo')
                        Foto invalida
                    @enderror
                </fieldset>
                <br>
                <br><hr>
                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
        </div>
    </div>


    <script src="js/script.js"></script>


@endsection
