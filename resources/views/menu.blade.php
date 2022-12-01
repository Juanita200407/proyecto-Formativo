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
<body>
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
                            <form action=" {{ route('carritos.store') }}" method="post"> 
                                @csrf   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-card-text">Tamaño:
                                            {{ $item->tamaño }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <td><input type="number" id="cantidad" name="cantidad" class="cantidad text-center" value={{ $item->cantidad}} data-bs-toggle="tooltip" data-bs-placement="right"
                                            data-bs-title="Ingrese la cantidad que deseas"></td>
                                    </div>
                                </div>
                                <div class="d-card-text">Precio:
                                    ${{ number_format($item->precio) }}
                                </div>
                                {{-- <a href="{{ route('carrito.store', $item->id) }}" class="btn btn-outline-dark"><i class="fa-solid fa-cart-shopping"></i>comprar</a> --}}
                                <div class="row">
                                    <div class="col-md-6 my-2">
                                        <a href="{{ route('welcome.index') }}" class="btn btn-outline-danger"><i class="fa-solid fa-arrow-left mx-2"></i>regresar</a>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <td><input type="hidden" id="nombre" name="nombre" value={{ $item->nombre }}></td>
                                        <td><input type="hidden" id="descripcion" name="descripcion" value={{ $item->descripcion }}></td>
                                        <td><input type="hidden" id="tamaño" name="tamaño" value={{ $item->tamaño }}></td>
                                        <td><input type="hidden" id="precio" name="precio" value={{ $item->precio }}></td>
                                        <td><input type="hidden" id="foto" name="foto" value={{ $item->foto }}></td>
                                        {{-- <td><input type="hidden" id="precio" name="user_id" value={{ $userId }}></td> --}}
                                        <td><input type="hidden" id="precio" name="producto_id" value={{ $item->id }}></td>
                                    
                                        <td><input type="hidden" name="precioA" id="precioA"></td>
                                        <td><input type="hidden" name="precioT" readonly id="precioT"></td>
                                        <div>
                                            <button class="btn btn-outline-dark" id="calcular"><i class="fa-solid fa-plus fa-flip mx-2" style="--fa-flip-x: 1; --fa-flip-y: 0;"></i>Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            
            
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </button>   
    </form>
        </div>

    </body>
    </html>


        



<script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script>
    var p1 = document.getElementById("precio");
    var p2 = document.getElementById("cantidad");
    var boton_de_calcular= document.getElementById("calcular");
    boton_de_calcular.addEventListener("click", res);

    function res(){
        var multi = p1.value * p2.value;
        document.getElementById("precioA").value = multi;
        document.getElementById("precioT").value = multi;
    }
    const myTooltipEl = document.getElementById('cantidad')
        const tooltip = bootstrap.Tooltip.getOrCreateInstance(myTooltipEl)

        myTooltipEl.addEventListener('hidden.bs.tooltip', () => {
        // do something...
        })

        tooltip.hide()
</script>



</body>
</html>
