
@extends('layouts.fo_layout')

@section('content')

    @if (session('error'))
        <br><hr><br>

        <div class="container-fluid message-add-user-error text-center">
            <h3>{{session('error')}}</h3>
        </div>
        <br>
    @endif

    @if (session('message'))
        <br><hr><br>

        <div class="container-fluid message-add-user-sucess text-center">
            <h3>{{session('message')}}</h3>
        </div>
        <br>
    @endif

    <div class="container-fluid">
        <br>
        <h1 class="merriweather-regular text-center">Bem-vindo a melhor database de bandas</h1>
        <hr>

        <img src="{{asset('img/baner.jpg')}}" style="width: 100%; height: 400px;border-radius: 20px;">

        <br>
        <hr>
        <br>

        {{-- cards para preencher a pagina --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="{{asset('img/banda1.jpeg')}}" class="card-img-top" alt="imagem de uma banda" style="width: 100%; height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">Crimson Echo</h5>
                  <p class="card-text">Uma banda de rock progressivo que combina guitarras distorcidas com letras introspectivas, criando uma experiência sonora que ecoa na mente dos ouvintes.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Inserida ha 3 dias</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{asset('img/banda2.jpg')}}" class="card-img-top" alt="imagem de uma banda" style="width: 100%; height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">Neon Shadows</h5>
                  <p class="card-text">Um grupo de synthwave que mistura batidas eletrônicas dos anos 80 com temas futuristas, transportando o público para uma viagem nostálgica e cheia de luzes neon.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Inserida ha 2 semanas</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{asset('img/banda3.jpg')}}" class="card-img-top" alt="imagem de uma banda" style="width: 100%; height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">Velvet Abyss</h5>
                  <p class="card-text">Uma banda de metal gótico que explora temas sombrios e melancólicos, com vocais poderosos e instrumentais densos que mergulham o ouvinte em um abismo de emoções.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Inserida ha 4 semanas</small>
                </div>
              </div>
            </div>
          </div>

        <br>
        <hr>
        <br>


    </div>

</h1>


@endsection
