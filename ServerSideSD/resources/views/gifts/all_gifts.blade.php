@extends('layouts.fo_layout')

@section('content')

    @if (session('message'))
        <div class="container-fluid message-add-user-sucess text-center">
            <h3>{{session('message')}}</h3>
        </div>
    @endif


    <div class="container-fluid">
        <div class="row">
            <div class="col-7"><h1>As prendas sao: </h1></div>
            <div class="col-4 text-end"><h4>Adicionar nova prenda: </h4></div>
            <div class="col-1"><img src="img/new-product.png" alt="imagem: nova prenda" class="img-gifts-add" style="cursor: pointer;" onclick="Show()"></div>
        </div>
    </div>

    <br>

    <table class="table table-dark table-striped table-hover text-center">

        <tr>
            <td>Nome</td>
            <td>Pessoa de Destino</td>
            <td>Valor previsto</td>
            <td>Valor gasto</td>
            <td>Diferença do valor</td>
            <td>|</td>
            <td>Editar</td>
            <td>|</td>
            <td>Apagar</td>
        </tr>

        @foreach ($data as $newData)
                <tr>
                    <td onclick="window.location='{{ route('gifts.info', $newData->id) }}';" style="cursor: pointer;">{{ $newData->name }}</td>
                    <td onclick="window.location='{{ route('gifts.info', $newData->id) }}';" style="cursor: pointer;">{{ $newData->userName }}</td>
                    <td onclick="window.location='{{ route('gifts.info', $newData->id) }}';" style="cursor: pointer;">{{ $newData->price }}</td>
                    <td onclick="window.location='{{ route('gifts.info', $newData->id) }}';" style="cursor: pointer;">{{ $newData->costs }}</td>
                    <td onclick="window.location='{{ route('gifts.info', $newData->id) }}';" style="cursor: pointer;">{{ $newData->costs - $newData->price }}</td>
                    <td>|</td>
                    <td onclick="window.location='{{ route('gifts.update', $newData->id) }}';" style="cursor: pointer;"><img src="{{asset('img/pen.png')}}" alt="imagem: editar prenda" class="img-gifts"></img></td>
                    <td>|</td>
                    <td onclick="window.location='{{ route('gifts.delete', $newData->id) }}';" style="cursor: pointer;"><img src="{{asset('img/delete.png')}}" alt="imagem: apagar prenda" class="img-gifts"></img></td>
                </tr>
        @endforeach

    </table>

    {{-- formulario para criar prendas --}}
    <div class="modal modal-add-gifts" id="addGifts">
        <div class="modal-content" id="formAddGifts">
            <form method="POST" action="{{ route('gifts.create') }}" class="text-center">
                @csrf

                <h1>Adicionar nova prenda</h1>

                <hr>

                <fieldset>
                    <legend>Nome: </legend>
                    <input type="text" id="name" name="name" class="users-input-text-style"><br>
                    @error('name')
                        Nome invalido
                    @enderror
                </fieldset>
                <br>
                <fieldset>
                    <legend>Price: </legend>
                    <input type="number" id="price" name="price" class="users-input-text-style" step="0.01" min="0"><br>
                    @error('price')
                        Preço invalido
                    @enderror
                </fieldset>
                <br>
                <fieldset>
                    <legend>Real Cost: </legend>
                    <input type="number" id="costs" name="costs" class="users-input-text-style" step="0.01" min="0"><br>
                    @error('costs')
                        Custo invalido
                    @enderror
                </fieldset>
                <br>
                <fieldset>
                    <legend>ID da pessoa Responsavel: </legend>
                    <select id="user_id" name="user_id" class="users-input-text-style">
                        @foreach ($users as $opcao)
                            <option value="{{ $opcao->id}}">{{ $opcao->name}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        id invalido
                    @enderror
                </fieldset>
                <br><hr>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>


    <script src="js/script.js"></script>

@endsection
