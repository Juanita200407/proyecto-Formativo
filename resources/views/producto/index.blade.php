@extends('layouts.main')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('producto.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear un nuevo producto') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Nombreproducto</th>
										<th>Descrpcion</th>
										<th>Tamaño</th>
										<th>Cantidad</th>
										<th>Precio</th>
                                        <th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($producto as $item)
                                        <tr>
											<td>{{ $item->nombre }}</td>
											<td>{{ $item->descrpcion }}</td>
											<td>{{ $item->tamaño }}</td>
											<td>{{ $item->cantidad }}</td>
											<td>{{ $item->precio }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-outline-primary " href="{{ route('producto.show', $item->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-outline-success" href="{{ route('producto.edit', $item->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                <form action="{{ route('producto.destroy',$item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                { $productos->links() }
            </div>
        </div>
    </div>
@endsection
