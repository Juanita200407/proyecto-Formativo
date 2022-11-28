<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/producto.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Document</title>
</head>
<body class="fondo">
    <nav class="navbar navbar-expand-lg navbar-dark shadow" id="color">
        <div class="container">
            <a class="navbar-brand" @can(['administrador']) href="{{ route('producto.index')}}" @endcan>Alitas Mary</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"*>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @can(['administrador'])
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categoria
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('categoria.index')}}">listar</a></li>
                            @can(['administrador'])
                            <li><a class="dropdown-item" href="{{ route('categoria.create')}}">crear menu</a></li>
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
                            <li><a class="dropdown-item" href="{{ route('producto.create')}}">crear menu</a></li>
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." name="buscar" aria-label="Buscar">
                    <button class="btn btn-outline-dark" type="submit">Buscar</button>
                </form>
                <a class="navbar-brand" href="{{ route('login') }}">
                    <a href="{{ route('login') }}" class="btn">Ingresar</a>
                </a>  
            </div>
        </div>
    </nav>

   
    
    <div class="container  text-center mt-1 text-capitalize">
        <h1 class="text-dark my-5" id="animacion">Bienvenidos estimado cliente</h1>
            <div class="col-md-12 section-title text-center my-5">
                <h3>Categoría</h3>
            </div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-container mySwiper">
             
                    <div class="swiper-wrapper">
                        @foreach ($categorias as $item)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage'). '/'. $item->foto }}"
                                    alt="">
                                <div class="card-description">
                                    <div class="card-title text-center">
                                        <h4>{{ $item->tipo }}</h4>
                                    </div>
                                    <div class="card-link">
                                        @guest
                                        <a href="{{ route("login") }}">Ver más</a>
                                        @endguest
                                        @auth
                                        <a href="{{ route('menu.item', $item->tipo) }}">Ver más</a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div class="row my-5">
                <div class="col-md-6 text">
                    <h3>Misión</h3>
                    <p>Tiene como misión darle la excelencia a nuestros productos de comidas rápidas. nutritivos, sanos y frescos. en función de satisfacer las necesidades del consumo, proporcionando en forma permanente bienestar de las personas. Entregamos a nuestros consumidores los productos que ellos prefieren y eligen por nuestra calidad y presentación.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 text">
                    <h3>Visión</h3>
                    <p class="">Tiene como visión consolidarnos como la mejor empresa a nivel nacional, en cuanto a la producción y venta de comidas rápidas, apoyándonos en instalaciones con la más alta tecnología para el manejo de nuestros productos y contamos con personal altamente calificado manteniendo nuestro riguroso y estricto control de calidad.</p>
                </div>
            </div>
    </div>

    


    

    {{-- <div class="about-us section-padding" data-scroll-index='1'> --}}
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-12 section-title text-center">
                    <h3>Categoria</h3>
                </div>
                <div class="col-sm-3">
                    <div class="card p-3 my-3">
                        <img src="{{ asset('images/hamburguesa.png') }}" class="card-img-top" id="foto" alt="Hamburguesa">
                      <div class="card-body">
                        <h5 class="section-title text-center"><a href="#" class="card-link text-decoration-none text-dark">Hamburguesas</a></h5>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    

    
  
      <!-- Swiper JS -->
      <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  
      <!-- Initialize Swiper -->
    <script>
            var swiper = new Swiper('.swiper-container', {
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
        },
        slidesPerView: 1,
        spaceBetween: 10,
        // init: false,
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },

    
        breakpoints: {
        620: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        680: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        920: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1240: {
            slidesPerView: 4,
            spaceBetween: 50,
        },
        } 
        });
    </script>
    


    
    

<script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>