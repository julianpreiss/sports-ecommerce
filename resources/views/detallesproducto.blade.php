<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Producto[] $producto */
?>

@extends('layouts.main')

@section('title', 'Producto' . $producto->nombre)

@section('content')

<section class="text-center container mt-3">
    <h2 class="col-12 text-center">{{$producto->nombre}}</h2>
	<div class="row">
			<section class="col-12 py-3 my-3 border rounded d-sm-block justify-content-center">

					<div class="row">

						<div class="col-md-6">
							<h3>Imagen del producto</h3>
							@if($producto->imagen !== null)
							<img class="card-img-top" src="{{ url('img/' . $producto->imagen) }} " 
							@if($producto->descripcionimg !== null)
							alt="{{ $producto->descripcionimg}}">
							@else
							alt="{{ $producto->nombre}}">
							@endif
							@endif
						</div>

						<div class="mt-2 col-md-6 text-center">
							<h3>Detalles del producto</h3>
							<ul class="list-unstyled mt-3">
								<li class="mb-4">Marca: {{$producto->marca}}</li>
								<li class="my-4 ">Deporte: {{$producto->deporte}}</li>
								<li class="my-4 ">Precio: ARS ${{$producto->precio}}</li>
							</ul>
							@auth
							<form action="{{ route('carrito.agregaralcarrito', ['idproducto' => $producto->id]) }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="d-flex justify-content-center">
									<div class="mr-4">
										<label for="unidades">Unidades</label>
										<select 
											class="form-control" 
											id="unidades"
											name="unidades" 
										>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
									<div>
										<button type="submit" class="btn btn-primary ">Agregar al carrito</button> 
									</div>
								</div>
							</form>
							@elseguest
							<p class="small">*Para poder agregar el producto a tu carrito, debés estar logueado con tu cuenta.</p>
							@endauth
						</div>
					</div>
			</section>

	</div>
    <a class="btn btn-primary m-1" href="{{ route('productos')}}" aria-label="Volver atrás">Volver</a>

</section>

@endsection
