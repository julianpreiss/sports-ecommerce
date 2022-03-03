<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Producto[] $productos */
?>

@extends('layouts.admin')

@section('title', 'Listado de Productos')

@section('content')
	<main class="container">
		<h2>Listado de productos</h2>

        <div>
            <a class="btn btn-secondary my-2" href="{{ route('admin.agregarproductoForm') }}">Agregar nuevo producto</a>
        </div>

	<table class="table table-striped table-bordered table-responsive-md">
		<thead>
		<tr>
			<th>Nombre</th>
			<th>Marca</th>
			<th>Deporte</th>
			<th>Precio</th>
            <th>Acciones</th>
		</tr>
		</thead>
		<tbody>
			@foreach($productos as $producto)
			<tr>
				<td>{{ $producto->nombre }}</td>
				<td>{{ $producto->marca }}</td>
				<td>{{ ($producto->deporte) }}</td>
				<td>$ {{ $producto->precio }}</td>
                <td>
                    <a class="btn btn-primary m-1" href="{{ route('admin.detallesproducto', ['id' => $producto->id]) }}" aria-label="Ver detalles de {{ $producto->titulo }}">Ver</a>
                    <a class="btn btn-warning m-1" href="{{ route('admin.editarproductoForm', ['id' => $producto->id]) }}" aria-label="Editar {{ $producto->titulo }}">Editar</a>
                    <a class="btn btn-danger m-1 text-white" aria-label="Eliminar {{ $producto->titulo }}" data-toggle="modal" data-target="#deleteModal{{ $producto->id }}">Eliminar</a>

					<div class="modal fade" id="deleteModal{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $producto->id }}" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  	<div class="modal-content">
								<div class="modal-header">
							  		<div class="modal-title" id="deleteModalLabel{{ $producto->id }}">Estás seguro que deseas eliminar este producto?</div>
							  		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
							  		</button>
								</div>
								<div class="modal-body">
									<form action="{{ route('admin.eliminarproducto', ['id' => $producto->id]) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger m-1">Eliminar</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									</form>
								</div>
						  	</div>
						</div>
					</div>
                </td>
			</tr>
	@endforeach
		</tbody>
	</table>
	</main>
    
@endsection