<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Articulo[] $articulos */
?>

@extends('layouts.admin')

@section('title', 'Listado de Articulos')

@section('content')
	<main class="container">
		<h2>Listado de articulos</h2>

        <div>
            <a class="btn btn-secondary my-2" href="{{ route('admin.agregararticuloForm') }}">Agregar nuevo articulo</a>
        </div>

	<table class="table table-striped table-bordered table-responsive">
		<thead>
		<tr>
			<th>Id</th>
			<th>Titulo</th>
			<th>Preview</th>
			<th>Temáticas</th>
			<th>Acciones</th>
		</tr>
		</thead>
		<tbody>
			@foreach($articulos as $articulo)
			<tr>
				<td>{{ $articulo->id }}</td>
				<td>{{ $articulo->titulo }}</td>
				<td>{{ $articulo->preview }}</td>
				<td>@if($articulo->tematicas->count() > 0) 
					@foreach($articulo->tematicas as $tematica)
					<span class="badge bg-primary text-white">{{ $tematica->categoria }}</span>
				@endforeach
				@endif</td>
                <td>
                    <a class="btn btn-primary m-1" href="{{ route('admin.detallesarticulo', ['id' => $articulo->id]) }}" aria-label="Ver detalles de {{ $articulo->titulo }}">Ver</a>
                    <a class="btn btn-warning m-1" href="{{ route('admin.editararticuloForm', ['id' => $articulo->id]) }}" aria-label="Editar {{ $articulo->titulo }}">Editar</a>
					<form action="{{ route('admin.eliminararticulo', ['id' => $articulo->id]) }}" method="post">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger m-1">Eliminar</button>
					</form>
                </td>
			</tr>
	@endforeach
		</tbody>
	</table>
	</main>
    
@endsection