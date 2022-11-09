<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <title>Menu</title>
</head>
<body class="fondo">
    
    <h2 class="text-center mt-6 ">Menu</h2>
    <div class="col-10 ps-5">
        <div class="row">
            @foreach ($productos as $item)
            <div class="compra">
                <a href="{{ route('clientes.create') }}" class="btn btn-outline-success"><i class="fa-solid fa-cart-shopping">Compra</a>
            </div>
            <div class="col-md col-12 justify-content-center mb-5">
                <div class="card m-auto" style="auto">
                    <img src="{{ asset('storage'). '/'. $item->foto }}" class="card-img-top" height="80;" width=";" alt="">
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <div class="card-group">
           <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/hamburguesa.png') }}">
            <div class="card-body">
                <h5 class="card-title">Hamburguesa de Pollo</h5>
                <p class="card-text">Descripcion: tomate,lechuga,cebolla,queso,pollo Y Papa.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Precio:9.000</li>
            </ul>
            <div class="card-link">
                <a href="{{ route('Login') }}">Comprar</a>
            </div>
        </div>
       <br></br>
    
    <div class="card" style="width: 18rem;">
    <img src="{{ asset('images/hamburguesa.png') }}">
    <div class="card-body">
        <h5 class="card-title">Hamburguesa  Criolla</h5>
        <p class="card-text">Descripcion: carne,huevo,lechuga,cebolla,tomate,queso,tocineta Y Papa.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Precio:15.000</li>
    </ul>
    <div class="card-link">
        <a href="{{ route('Login') }}">Comprar</a>
    </div>  

    <br></br>

    <div class="card" style="width: 18rem;">
    <img src="{{ asset('images/hamburguesa.png') }}">
    <div class="card-body">
        <h5 class="card-title">Hamburguesa Mixta </h5>
        <p class="card-text">Descripcion: carne,pollo,lechuga,cebolla,tomate,queso Y Papa.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Precio:15.000</li>
    </ul>
    <div class="card-link">
        <a href="{{ route('login') }}">Comprar</a>
    </div>  
    <div class="card-body">
    <button type="button" class="btn btn-outline-dark">Regresar</button>  
    </div>
</div>


<script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>

</body>
</html>