<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Producto[] $producto */
?>

@extends('layouts.admin')

@section('title', 'Producto' . $producto->nombre)

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <h2 class="col-12 text-center">{{$producto->nombre}}</h2>
	<div class="row">

			<article class="col-md-4 offset-md-4 py-3 my-3 border rounded d-sm-block justify-content-center">
				<h3>{{$producto->nombre}}</h3>
				<figure>
					<div class="row">
						<div class="col">
						@if ($producto->imagen !== null)
						<img class="img-fluid" src="{{ url('img/' . $producto->imagen) }}" alt="{{$producto->descripcionimg}}">
						@else
						<span class="text-center">No hay imagen cargada para este producto</span>
						@endif
					</div>
					</div>
									
					<figcaption class="mt-4">		
				
						<div class="mt-2">
							<ul class="list-unstyled mt-3">
								<li class="mb-4">
									<span class="h4">Marca: {{$producto->marca}}</span>
								</li>
								<li class="my-4">
									<span class="h4">Deporte: {{$producto->deporte}}</span>
								</li>
								<li class="my-4">
									<span class="h4">Precio: {{$producto->precio}}</span>
								</li>
							</ul>
						</div>
					</figcaption>
				</figure>
			</article>

			
		</div>
		<a class="btn btn-primary m-1" href="{{ route('admin.productos')}}" aria-label="Volver atrás">Volver</a>
</section>

@endsection
