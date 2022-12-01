<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/producto.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <title>@yield('titulo')</title>
</head>
<body class="fondo">
<nav class="navbar navbar-expand-lg navbar-dark shadow" id="color">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome.index') }}">
                <img src="{{ asset('images/alitas.png') }}" alt="Bootstrap" width="120" height="50">
              </a>
            <a class="navbar-brand" @can(['administrador']) href="{{ route('producto.index')}}" @endcan>Alitas Mary</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"*>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @can(['administrador'])
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categoría
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('categoria.index')}}">listar</a></li>
                            @can(['administrador'])
                            <li><a class="dropdown-item" href="{{ route('categoria.create')}}">crear categoría</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can(['administrador'])
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Producto
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('producto.index')}}">listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('producto.create')}}">crear producto</a></li>
                        </ul>
                    </li>
                    @endcan
                    <a class="navbar-brand" href="{{ route('carritos.index')}}">
                        <img src="{{ asset('images/carrito.png') }}" alt="Bootstrap" width="30" height="24">
                    </a>
                    @can(['administrador'])
                    <li class="nav-item">
                        <a href="{{ route('usuarios.index') }}" class="nav-link">Usuarios</a>
                    </li>
                    @endcan


                </ul>
                {{-- <a class="nav-link dropdown-toggle" href="{{ route('carrito.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    carrito
                </a> --}}
                @can(['administrador'])
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." name="buscar" aria-label="Buscar">
                    <button class="btn btn-outline-dark" type="submit">Buscar</button>
                </form>
                @endcan
                <ul class="navbar-nav text-white ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout')}}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-5 my-5" id="container-inicio">
        <h1 class="text-center p-3 my-3">@yield('titulo')</h1>
        @yield('content')
    </div>
    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')
</body>
</html>