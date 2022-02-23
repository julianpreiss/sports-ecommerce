@extends('layouts.main')

@section('title', 'Mi Carrito')

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <h2 class="col-12 text-center">Mi carrito</h2>
	<div class="row d-flex justify-content-center">
        <?php 
		if($productosarray) {
			$total = 0;
			foreach($productosarray as $producto){
				$total = $total + $producto['precio']*$producto['unidades'];
			}
		?>
		<div class="my-4">
			<div class="h4">Total a pagar: ${{ $total }}</div>
			<form class="d-inline-block" action="{{ route('carrito.vaciar') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="mt-2 ">
					<button type="submit" class="btn btn-danger ">Vaciar Carrito</button> 
				</div>
			</form>
			<a class="d-inline-block btn btn-primary" href="{{ route('carrito.checkout') }}">Pagar</a>
		</div>
				
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<h3>Productos en carrito</h3>
		</div>
        <?php 
        // print_r($idsproducto);
        // print_r($matchingproductunities);
        // print_r($productosarray);
        // print_r($misproductos);
        foreach($productosarray as $producto):
        ?>
			<article class="col-md-3 py-3 d-sm-block justify-content-center d-flex">
				<div class="card ">
					@if($producto['imagen'] !== null)
					<img class="card-img-top img-carrito" src="{{ url('img/' . $producto['imagen']) }}" 
						@if($producto['descripcionimg'] !== null)
						alt="{{ $producto['descripcionimg']}}">
						@else
						alt="{{ $producto['nombre']}}">
						@endif
					@endif
					<div class="card-body">
						<h3 class="card-title">{{$producto['nombre']}}</h3>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Precio: ARS ${{$producto['precio']}}</li>
						<li class="list-group-item">
							<div>Unidades en carrito: {{$producto['unidades']}}</div>
							<div>
								<div class="d-flex justify-content-center">
									<form action="{{ route('carrito.eliminarunidad', ['idproducto' => $producto['id']]) }}" method="POST" enctype="multipart/form-data">
										@csrf
										<button type="submit" class="btn btn-secondary mt-1 mr-3">-</button> 
									</form>
									<form action="{{ route('carrito.sumarunidad', ['idproducto' => $producto['id']]) }}" method="POST" enctype="multipart/form-data">
										@csrf
										<button type="submit" class="btn btn-secondary mt-1">+</button> 
									</form>
								</div>
							</div>
						</li>
					</ul>
					<div class="card-body">
						<a href="{{ route('detallesproducto', ['id' => $producto['id']]) }}" class="btn btn-primary">Ver Producto</a>

					<form action="{{ route('carrito.eliminarproducto', ['idproducto' => $producto['id']]) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<button type="submit" class="btn btn-danger mt-1">Eliminar del carrito</button> 
					</form>
					</div>
				</div>
			</article>

            <?php
            endforeach;
		}
            ?>
	</div>
	<p class="col-12 text-center">Aún no tienes productos agregados al carrito. Visita nuestra galería de productos y empieza a llenar tu carrito!</p>
</section>

@endsection