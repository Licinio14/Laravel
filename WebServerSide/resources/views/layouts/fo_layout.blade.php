<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarefa Laravel</title>

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">



</head>
<body>

    {{-- navebar --}}
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">BandBase</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{route('bands.show_all')}}">Lista Bandas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('albuns.show_all')}}">Lista Albuns</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('chat.show')}}">Chat</a>
              </li>
            </ul>

                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth

                            <div class="row">

                                <div class="col">
                                    <a href="{{ route('dashboard.show') }}"
                                       class="btn btn-info">
                                        Dashboard
                                    </a>
                                </div>
                                <div class="col">
                                    <form name="logout" action="{{ route('logout')}}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-danger">Logout</button>


                                    </form>
                                </div>


                            </div>



                        @else
                            <a
                                href="{{ route('login') }}"
                                class="btn btn-info"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('users.add') }}"
                                    class="btn btn-info"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif

          </div>
        </div>
      </nav>


    {{-- container para o conteudo nao ficar colado a lateral --}}
    <div class="container body-div">
        {{-- chamar o conteudo // 'content' é o nome que vai chamar --}}
        @yield('content')
    </div>

    <br><br>

    {{-- footer --}}
    <footer class="text-center text-lg-start footer-color bg-primary">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2025 Copyright:
          <a class="text-body footer-text-link-color" target="_blank" href="https://github.com/Licinio14?tab=repositories">GitHUb</a>
        </div>
        <!-- Copyright -->
    </footer>


    {{-- script bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>
</html>
