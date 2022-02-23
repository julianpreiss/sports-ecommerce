<?php 
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Producto[] $productos */
?>

@extends('layouts.main')

@section('title', 'Listado de productos')

@section('content')

<section class="text-center offset-md-1 col-md-10 container mt-3">
    <h2 class="col-12 text-center">Galería</h2>
	<div class="row">

        <?php 
        foreach($productos as $producto): 
        ?>

			<article class="col-md-4 py-3 d-sm-block justify-content-center d-flex">
				<div class="card ">
					@if($producto->imagen !== null)
					<img class="card-img-top" src="{{ url('img/' . $producto->imagen) }}" 
						@if($producto->descripcionimg !== null)
						alt="{{ $producto->descripcionimg}}">
						@else
						alt="{{ $producto->nombre}}">
						@endif
					@endif
					<div class="card-body">
						<h3 class="card-title">{{$producto->nombre}}</h3>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Precio: ARS ${{$producto->precio}}</li>
					</ul>
					<div class="card-body">
						<a href="{{ route('detallesproducto', ['id' => $producto->id]) }}" class="card-link">Ver detalles</a>
					</div>
				</div>
			</article>

            <?php
            endforeach;
            ?>
	</div>
</section>

@endsection
