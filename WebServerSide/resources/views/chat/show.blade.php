
@extends('layouts.fo_layout')

@section('content')

    @if (session('message'))
        <br><hr><br>

        <div class="container-fluid message-add-user-sucess text-center">
            <h3>{{session('message')}}</h3>
        </div>
        <br>
    @endif

    <br><hr><br>

    <div class="container mt-4">
        @foreach ($chats as $chat)
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <!-- Imagem do usuário -->
                                <div class="flex-shrink-0">
                                    <img src="{{ $chat->user->photo ? asset('storage/' . $chat->user->photo ) : asset('img/noimage.png')}}"
                                        class="rounded-circle"
                                        alt="Foto do perfil"
                                        width="50"
                                        height="50">
                                </div>

                                <!-- Conteúdo da mensagem -->
                                <div class="flex-grow-1 ms-3">
                                    <!-- Nome do usuário e data -->
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title mb-1"> {{ $chat->user->name }} </h5>
                                        <small class="text-muted">{{ $chat->date }}</small>
                                    </div>

                                    <!-- Título da mensagem -->
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $chat->title }}</h6>

                                    <!-- Mensagem -->
                                    <p class="card-text">{{ $chat->coment }}</p>
                                </div>
                                @if (Auth::user()->user_type == 1)
                                <a style="margin: 20px" class="btn btn-danger" href="{{ route('chat.delete', $chat->id) }}">Apagar</a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container-fluid">
        {{ $chats->links('pagination::bootstrap-5') }}
    </div>

    <br><hr><br>

    <div class="container text-center">
        <a class="btn btn-info" onclick="Show()" >Comentar</a>
    </div>



    <div class="modal modal-add-gifts" id="addGifts">
        <div class="modal-content" id="formAddGifts">
            <form method="POST" action="{{ route('chat.create') }}" class="text-center" enctype="multipart/form-data">
                @csrf

                <h1 class="merriweather-regular">Adicionar comentario</h1>
                <hr>
                <fieldset>
                    <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}" class="users-input-text-style"><br>
                    @error('name')
                        Nome invalido
                    @enderror
                </fieldset>
                <fieldset>
                    <legend>Titulo: </legend>
                    <input type="text" id="title" name="title" class="users-input-text-style"><br>
                    @error('name')
                        Nome invalido
                    @enderror
                </fieldset>
                <br>
                <fieldset>
                    <legend>Comentario: </legend>
                    <textarea type="text" id="coment" name="coment" rows="5" cols="50" class="users-input-text-style"></textarea><br>
                    @error('name')
                        Comentario invalido
                    @enderror
                </fieldset>
                <br>
                <br><hr>
                <button type="submit" class="btn btn-primary">Submeter</button>

            </form>
        </div>
    </div>


    <script src={{asset('js/scriptChat.js')}}></script>

@endsection
