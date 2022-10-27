<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    
    <title>Document</title>
</head>
<body class="fondo">
    <nav class="navbar navbar-expand-lg navbar-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="{{ asset('images/alitas.png') }}" alt="Logo" width="150" height="55" class="d-inline-block align-text-center">
              Alitas de mary
            </a>
          </div>
          <a class="navbar-brand" href="#">
            <a href="{{ route('login') }}" class="btn">Ingresar</a>   
        </div>
      </nav>
    <div class="container  text-center mt-1">
            <h1 class="text-dark">Bienvenidos estimado cliente</h1>
            <div class="col-md-12 section-title text-center my-5">
                <h3>Categoria</h3>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-container mySwiper">
             
                    <div class="swiper-wrapper">
                        @foreach ($categoria as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage'). '/'. $item->foto }}"
                                alt="">
                            <div class="card-description">
                                <div class="card-title">
                                    <h4>{{ $item->tipo }}</h4>
                                </div>
                                <div class="card-link">
                                    <a href="{{ route('producto.item', $item->tipo) }}">Ver más</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
             
             
        
            </div>
    </div>

    <h2 class="text-center p-5 my-5">Menu</h2>
    <div class="col-10 ps-5">
        <div class="row">
            @foreach ($producto as $item)
            <div class="col-md col-12 justify-content-center mb-5">
                <div class="card m-auto" style="auto">
                <img src="{{ asset('storage'). '/'. $item->foto }}" class="card-img-top" height="120" alt="">
                <div class="card-body">
                    <h5 class="card-title my-2">{{ $item->nombre }}</h5>
                    <div class="d-card-text">Descrpcion:
                        {{ $item->tipo }}
                    </div>
                    <div class="d-card-text">Descrpcion:
                        {{ $item->descripcion }}
                    </div>
                    <div class="d-card-text">Tamaño:
                        {{ $item->tamaño }}
                    </div>
                    <div class="d-card-text">Precio:
                        {{ $item->precio }}
                    </div>
                </div>
                </div>
            </div>
            @endforeach
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