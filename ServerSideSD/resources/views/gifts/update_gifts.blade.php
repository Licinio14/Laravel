
@extends('layouts.fo_layout')

@section('content')
    <h1>Update Users</h1>
    <br><hr><br>

    <form method="POST" action="{{ route('gifts.updateGift') }}" class="text-center">
        @csrf

        <fieldset style="display: none">
            <legend>Id: </legend>
            <input type="text" placeholder="Utilizador" id="id" name="id" value="{{$inf->id}}" class="users-input-text-style" readonly style="background-color: lightgray"><br>

        </fieldset>
        <fieldset>
            <legend>Name: </legend>
            <input type="text" placeholder="Utilizador" id="name" name="name" value="{{$inf->name}}" class="users-input-text-style"><br>
            @error('name')
                Name invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Price: </legend>
            <input type="number" placeholder="Utilizador" id="price" name="price" value="{{$inf->price}}" class="users-input-text-style" step="0.01" min="0"><br>
            @error('email')
                Price invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>Costs : </legend>
            <input type="number" placeholder="Utilizador" id="costs" name="costs" value="{{$inf->costs}}" class="users-input-text-style" step="0.01" min="0"><br>
            @error('address')
                Cost invalido
            @enderror
        </fieldset>
        <br>
        <fieldset>
            <legend>User : </legend>
            {{-- <input type="text" placeholder="Utilizador" id="costs" name="costs" value="{{$inf->userName}}" class="users-input-text-style"><br> --}}
            <select id="user_id" name="user_id" class="users-input-text-style" >
                @foreach ($users as $opcao)
                    <option value="{{ $opcao->id}}" @selected($opcao->id == $inf->user_id)>{{ $opcao->name}}</option>
                @endforeach
            </select>
            @error('address')
                Cost invalido
            @enderror
        </fieldset>
        <br><hr>
        <button type="submit" class="btn btn-primary">Submit</button>
        @error('id')
            <br>
            Ocurreu um erro inesperado!
        @enderror

    </form>


    <br><hr><br>

@endsection
