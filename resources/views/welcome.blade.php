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
            </a>
          </div>
          <a class="navbar-brand" href="#">
            <a href="{{ route('categoria.index') }}"  type="button" class="btn btn-dark">Ingresar</a>   
        </div>
      </nav>
    <div class="container  text-center mt-1">
            <h1 class="text-dark">Bienvenidos estimado cliente</h1>
            <div class="col-md-12 section-title text-center my-5">
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-container mySwiper">
             
                    <div class="swiper-wrapper">
                        @foreach ($categorias as $item)
                        <div class="card" style="width: 18rem;">
                            <div class="swiper-slide">
                                <img src="{{ asset('categoriaController') }}">
                                <div class="card-description">
                                    <div class="card-title">
                                        <h4>{{ $item->tipo }}</h4>
                                    </div>
                                    
                                    <div class="card-link">
                                        <a href="{{ route('menu.item', $item->tipo) }}">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            
                </div>
    </div>

    

                </div>
            </div>
        </div>
    </div> 


      <!-- Swiper JS -->
      <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  
      <!-- Initialize Swiper -->
    <script>
            var swiper = new Swiper('.swiper-container', 
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
        );
    </script>


<script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>