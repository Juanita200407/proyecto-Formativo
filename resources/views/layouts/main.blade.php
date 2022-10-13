<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <title>@yield('titulo')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow" id="color">
        <div class="container">
            <a class="navbar-brand" href="{{ route('producto.index')}}">Alitas Mary</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"*>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Producto
                        </a>
                        @can(['administrador'])
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('producto.index')}}">listar</a></li>
                            <li><a class="dropdown-item" href="{{ route('producto.create')}}">crear menu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('usuarios.index') }}" class="nav-link">Usuarios</a>
                    </li>
                </ul>
                @endcan
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." name="buscar" aria-label="Buscar">
                    <button class="btn btn-outline-dark" type="submit">Buscar</button>
                </form>
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

    <div class="container my-6" id="container-inicio">
        <h1 class="text-center mt-5">@yield('titulo')</h1>
        @yield('content')
    </div>
    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')
</body>
</html>