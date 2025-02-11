
@extends('layouts.fo_layout')

@section('content')

    <div class="container-fluid">
        <hr>
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
                  <h5 class="card-title">Banda 1</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{asset('img/banda2.jpg')}}" class="card-img-top" alt="imagem de uma banda" style="width: 100%; height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">Banda 2</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{asset('img/banda3.jpg')}}" class="card-img-top" alt="imagem de uma banda" style="width: 100%; height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">Banda 3</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">Last updated 3 mins ago</small>
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
