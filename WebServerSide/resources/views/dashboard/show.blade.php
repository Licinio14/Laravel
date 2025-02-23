
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


        @auth
            @if (Auth::user()->user_type == 1)

                <hr>
                <h1 class="merriweather-regular text-center">Bem-vindo administrador {{ Auth::user()->name}}</h1>
                <hr>

            @else

                <hr>
                    <h1 class="merriweather-regular text-center">Bem-vindo {{ Auth::user()->name}}</h1>
                <hr>

            @endif
        @endauth


        {{-- pesquisa --}}

        <div class="container-fluid text-center">

            <form action="">
                <input type="text" id="search" name="search" value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-secondary">Procurar</button>
            </form>

        </div>

        <br><hr><br>

        <table class="table table-dark table-striped table-hover text-center">

            <tr>
                <td>ID</td>
                <td>Foto</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Tipo</td>
                @auth
                    <td></td>
                @endauth
            </tr>

            @foreach ($Users as $array)

                    <tr>
                        <td>{{ $array->id}}</td>
                        <td><img width="50px" height="50px" src="{{ $array->photo ? asset('storage/' . $array->photo ) : asset('img/noimage.png')}}"> </td>
                        <td>{{ $array->name}}</td>
                        <td>{{ $array->email}}</td>
                        <td>{{ $array->user_type == 1 ? "Admin" : "User"}}</td>


                            @auth
                                <td>



                                @if (Auth::user()->user_type == 1)
                                    <a class="btn btn-danger" href="{{ route('users.edit', $array->id) }}">Editar Utilizador</a>
                                    <a class="btn btn-danger" href="{{ route('users.delete', $array->id) }}">Apagar</a>
                                @endif

                                </td>
                            @endauth

                    </tr>

            @endforeach

        </table>

        @if (method_exists($Users, 'links'))
            <div class="container-fluid">
                {{ $Users->links('pagination::bootstrap-5') }}
            </div>
        @endif


        <script>
            // Aqui estamos passando a variável PHP para o JavaScript
            var dados = @json($Users);
        </script>

        @if (isset($edit))
        <script>
            window.onload = function() {
                UserShow();
            };
        </script>
        @endif

        <br><br>

        {{-- formulario para criar prendas --}}
        <div class="modal modal-add-gifts" id="addGifts">
            <div class="modal-content" id="formAddGifts">
                <form method="POST" action="{{ route('users.create') }}" class="text-center" enctype="multipart/form-data">
                    @csrf

                    <h1 class="merriweather-regular">Editar Utilizador</h1>

                    <hr>
                    <fieldset>
                        <input type="hidden" id="id" name="id" value="{{ isset($edit) ? $edit->id : null; }}" class="users-input-text-style"><br>
                    </fieldset>
                    <fieldset>
                        <legend>Nome: </legend>
                        <input type="text" id="name" name="name" value="{{ isset($edit) ? $edit->name : null; }}" class="users-input-text-style"><br>
                        @error('name')
                            Nome invalido
                        @enderror
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Tipo: </legend>
                        <input type="number" id="user_type" name="user_type" value="{{ isset($edit) ? $edit->user_type : null; }}" class="users-input-text-style" step="1" min="0" max="1"><br>
                        @error('user_type')
                            Tipo invalido
                        @enderror
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Imagem da banda: </legend>
                        <img id="imagemMostrar" src="{{ isset($edit) && $edit->photo != "" ? asset('storage/' . $edit->photo ) : asset('img/noimage.png') }}" width="50px" height="50px"><br><br>
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


        <script src={{asset('js/scriptUsers.js')}}></script>


        </div>



@endsection
