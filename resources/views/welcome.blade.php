<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class="container text-center mt-5">
            <h1 class="text-dark">Bienvenidos estimado cliente</h1>
            <header class="mb-auto mt-5">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Alitas Mary" class="logo">
            </header>
            <div class="fs-4 fw-lighter my-5">
                <a href="{{ route('producto.index') }}" class="btn btn-dark btn-lg w-25">Ingresar</a>  
            </div>
    </div>


    
    

<script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>