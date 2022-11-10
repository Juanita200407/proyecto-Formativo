<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/')}}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="fondo">

    <h1 class="text-center p-5 fw-bold text-dark fs-1  border-bottom pb-2 mb-4 mx-5 border-2 border-dark">Menú</h1>
        <div class="row row-cols-4 row-cols-md-4 mx-4 my-5 g-2">
            @foreach ($menu as $item)
            <div class="col text-capitalize">
              <div class="card">
                <img src="{{ asset('storage'). '/'. $item->foto }}" class="card-img-top" height="180;" width=";" alt="">
                    <div class="card-body">
                        <h5 class="card-title my-2">{{ $item->nombre }}</h5>
                        <div class="d-card-text">Descripcion:
                            {{ $item->descripcion }}
                        </div>
                        <div class="d-card-text">Tamaño:
                            {{ $item->tamaño }}
                        </div>
                        <div class="d-card-text">Precio:
                            {{ $item->precio }}
                        </div>
                        <div class="d-card-button compra">
                            <a href="{{ route('pedidos.create2', $item->id) }}" class="btn btn-outline-dark"><i class="fa-solid fa-cart-shopping"></i>comprar</a>
                            <a href="{{ route('welcome.index') }}" class="btn btn-outline-dark">regresar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
<script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>

</body>
</html>
